<?php
require_once (realpath(dirname(__FILE__) . "/../../includes/session.php"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="CepBrowser Manual,Genome Browser,Visualization" />
<meta name="description" content="This is the manual for CEpBrowser (Comparative Epigenome Browser). In CEpBrowser, genomes from multiple species are be shown side by side to enhance the comparison of various features, such as transcript information, epigenomic modifications, SNP's, transcription factor binding sites and so on, aiding users in comparative genomic research." />
<title>CEpBrowser Manual</title>
<link href="mainstyles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#GeneLookUp {
	width: 270px;
}
#geneInformation {
	width: 270px;
}
#colorPalette {
	width: 200px;
}
#Navigation {
	width: 270px;
}
#SampleSelection {
	width: 300px;
}
#TrackSetting {
	width: 366px;
}
#encodeLogo {
	border: none;
}
body {
	background-color: #FFFFFF;
	margin-right: 15px;
	margin-top: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
	overflow: auto;
}
.style1 {
	color: #FFFFFF
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 21px;
	margin-left: 10px;
	padding-left: 5px;
}
.style2 li {
	margin-left: -20px;
}
-->
</style>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo GOOGLE_ANALYTICS_ACCOUNT; ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<a name="top" id="top"></a>
<p class="Title">CEpBrowser Manual </p>
<p class="Header1"><a href="#top"></a>Index</p>
<ul>
  <li class="style2"><a href="#intro">Introduction</a></li>
  <li class="style2"><a href="#datagen">Data Generation</a></li>
  <li class="style2"><a href="#datasets">Available Datasets</a>
    <ul>
      <li><a href="#ENCODE">ENCODE Datasets</a></li>
    </ul>
  </li>
  <li class="style2"><a href="#usage">Using CEpBrowser </a>
    <ul>
      <li><a href="#lookup">Look up genes in <span class="panel">gene query</span> panel</a></li>
      <li><a href="#trackinformation"></a><a href="#viewquery">View query results in <span class="panel">region selection</span> panel</a></li>
      <li><a href="#visualize">Visualize the orthologous gene group in the <span class="panel">visualization</span> panel</a></li>
      <li><a href="#navigation">Navigate CEpBrowser via <span class="panel">navigation</span> panel</a></li>
      <li><a href="#trackselection">Use <span class="panel">track selection</span> panel to control the display of tracks and download data (three-species data and ENCODE data)</a></li>
      <li><a href="#trackinformation">Show track information and adjust settings in <span class="panel">track information &amp; settings</span> panel</a></li>
      <li><a href="#datadownload">Use <span class="panel">Table Browser</span> panel to  download data within specific regions and access other services</a></li>
    </ul>
  </li>
  <li class="style2"><a href="#contact">Contact Us</a></li>
  <li class="style2"><a href="#reference">References</a></li>
</ul>
<p class="Header1"><a href="#top"><img src="images/index.png" alt="to index" width="61" height="15" /></a><a name="intro" id="intro"></a>Introduction</p>
<p class="normaltext">CEpBrowser is a genome browser developed for comparative epigenomics study by Zhong Lab in University of California, San Diego. In CEpBrowser (Comparative Epigenome Browser), genomes from multiple species are be shown side by side to enhance the comparison of various features, such as transcript information, epigenomic modifications, SNP's, transcription factor binding sites and so on, aiding users in comparative genomic research. Color-coded regions within every gene context indicates the corresponding aligned part in the species to further help in comparison studies.</p>
<p class="normaltext">The gene track displaying mechanism in CEpBrowser is powered by UCSC Genome Browser (<a href="http://genome.ucsc.edu/" target="_blank">http://genome.ucsc.edu/</a>)<sup><a name="cite1_ref" id="cite1_ref"></a><a href="#cite1">[1]</a></sup> with some source modification.</p>
<p class="normaltext">If you find CEpBrowser helpful in your project, please cite the following publication to support future development:</p>
<p class="normaltext">Cao X, Zhong S. (2013) <a href="http://bioinformatics.oxfordjournals.org/content/29/9/1223.full" target="_blank">Enabling Interspecies Epigenomic Comparison with CEpBrowser.</a> <em>Bioinformatics</em>, 29(9): 1223-1225.
</p>
<p class="Header1"><a href="#top"><img src="images/index.png" alt="to index" width="61" height="15" /></a><a name="datagen" id="intro2"></a>Data Generation</p>
<p class="normaltext"><strong>Orthologous gene groups</strong> are genes that are orthologous across the species, which will help the user to locate  the wanted gene and its surrounding genomic regions. Orthologous gene pairs between any two of the species are retrieved from Ensembl Database (<a href="http://www.ensembl.org/" target="_blank">http://www.ensembl.org</a>)<sup><a name="cite2_ref" id="cite2_ref"></a><a href="#cite2">[2]</a></sup> and then assembled into orthologous groups. In CEpBrowser, the <strong>gene context</strong> in every orthologous gene group is the gene body with flanking sequences of the same gene length or 10kbp (whichever is larger). The gene context of all selected species will be shown for the orthologous gene group in query. Because there may be many-to-many or one-to-many ortholog relationships in gene pairs, there may be multiple genes for one species in one orthologous group. Users have the choice of which gene context to be shown in the browser.</p>
<p class="normaltext"><strong>Aligned segment groups</strong> are the color-coded segments in different species in the browser to help user determine the orthologous genetic sequence. Every one of the aligned segment groups will have one of the 16 color in CEpBrowser. The aligned groups are assembled from the human-centric aligned pairs, <em>i.e.</em>, a pair of aligned segments between human and the other species, from the chain file in UCSC <a href="http://genome.ucsc.edu/FAQ/FAQdownloads.html#download28" target="_blank">liftOver</a> tool<sup><a name="cite3_ref" id="cite3_ref"></a><a href="#cite3">[3]</a></sup>. The pairs between different species are then merged into a multi-species group in a way that in every aligned segment group, the maximum gap  length in any one of the species is not larger than 1200bp. In the case that one species does not have the aligned segments in the aligned group, the gap length is defined as the minimum length of the group in any of the other species. (See the figure below.) Only the aligned segment groups partially overlaps with a gene context in an orthologous gene group will be color-coded and shown in the browser. Gene contexts overlapping with no aligned segment group will have an asterisk (*) after their chromosome coordinates.</p>
<p class="normaltext"><img src="images/ortholog.jpg" width="791" height="162" /><span class="inlineImage"><br />
  <strong>Generating the comparable genomic regions of three species.</strong> Orthologous sequence pairs were obtained from the chain files generated by UCSC liftOver program [1]. Each orthologous sequence pair is show in one color (left). The grey blocks represent sequence gaps between neighboring orthologous sequence pairs. Two rules were applied to generate three-species comparable genomic regions. The first is induction rule: any mouse segment and any pig segment would be determined as orthologous when according to the chain file they were both orthologous to the same human segment (green segments, right panel). The second is gap elimination. Small gaps (less than 1200bp) between neighboring orthologous sequence pairs were eliminated (marked by +, left panel). The arrow represents this merging process.</span></p>
<p class="Header1"><a href="#top"><img src="images/index.png" alt="to index" width="61" height="15" /></a> <a name="datasets" id="datasets"></a>Available Datasets</p>
<p class="normaltext">So far there are three species supported on CEpBrowser:</p>
<ul class="normalnotes">
  <li>Homo sapiens (human), reference sequence <a href="/cgi-bin/hgGateway?clade=mammal&amp;org=Mouse" target="_blank">GRCh37/hg19</a>.<sup><a name="cite4_ref" id="cite4_ref"></a><a href="#cite4">[4]</a></sup></li>
  <li>Mus musculus (mouse), reference sequence <a href="/cgi-bin/hgGateway?clade=mammal&amp;org=Mouse&amp;db=mm9" target="_blank">NCBI37/mm9</a>.<sup><a name="cite5_ref" id="cite5_ref"></a><a href="#cite5">[5]</a></sup></li>
  <li>Sus scrofa (domestic pig), reference sequence <a href="/cgi-bin/hgGateway?clade=mammal&amp;org=Pig&amp;db=susScr2" target="_blank">SGSC Sscrofa9.2/susScr2</a>. <sup>[<a href="http://genome.ucsc.edu/goldenPath/credits.html#pig_credits">credit</a>]</sup></li>
</ul>
<p class="normaltext">For every species, there are a number of tracks showing various epigenomic modifications or transcription factor binding status of the genome. Here is a list of all the epigenomic / TF binding tracks available (in default track order):</p>
<table width="90%" border="2" align="center" cellspacing="0" bgcolor="#FFFFCC" class="normaltext">
  <tr>
    <th width="33%" bgcolor="#003366" class="style1" scope="col">Human</th>
    <th width="33%" bgcolor="#003366" class="style1" scope="col">Mouse</th>
    <th width="33%" bgcolor="#003366" class="style1" scope="col">Pig</th>
  </tr>
  <tr>
    <td width="33%" align="center" valign="middle">H3K4me1<a name="cite6_ref" id="cite6_ref"></a><sup><a href="#cite6">[6]</a></sup></td>
    <td width="33%" align="center" valign="middle">H3K4me1<sup><a href="#cite7">[7]</a></sup></td>
    <td width="33%" align="center" valign="middle">H3K4me1<a name="cite7_ref" id="cite7_ref"></a><sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">H3K4me2<sup><a href="#cite6">[6]</a></sup></td>
    <td align="center" valign="middle">H3K4me2<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle">H3K4me2<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td width="33%" align="center" valign="middle">H3K4me3<sup><a href="#cite6">[6]</a></sup></td>
    <td width="33%" align="center" valign="middle">H3K4me3<sup><a href="#cite7">[7]</a><a href="#cite11"></a></sup></td>
    <td width="33%" align="center" valign="middle">H3K4me3<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">H3K9me3<sup><a href="#cite6">[6]</a></sup></td>
    <td align="center" valign="middle">H3K9me3<a name="cite11_ref" id="cite11_ref"></a><sup><a href="#cite11">[11]</a></sup></td>
    <td align="center" valign="middle">H3K9me3<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">H3K27me3<sup><a href="#cite6">[6]</a></sup></td>
    <td align="center" valign="middle">H3K27me3<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle">H3K27me3<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">H3K36me3<sup><a href="#cite6">[6]</a></sup></td>
    <td align="center" valign="middle">H3K36me3<sup><a href="#cite7">[7]</a><a href="#cite11"></a></sup></td>
    <td align="center" valign="middle">H3K36me3<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">H3K27ac<sup><a href="#cite6">[6]</a></sup></td>
    <td align="center" valign="middle">H3K27ac<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle">H3K27ac<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">H2A.Z<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle">H2A.Z<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle">H2A.Z<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">MeDIP<sup><a name="cite8_ref" id="cite8_ref"></a><a href="#cite8">[8]</a></sup></td>
    <td align="center" valign="middle">MeDIP<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle">MeDIP<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle">MRE<sup><a href="#cite8">[8]</a></sup></td>
    <td align="center" valign="middle">MRE<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle">MRE<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">TAF1<a name="cite9_ref" id="cite9_ref"></a><sup><a href="#cite9">[9]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">TAF1<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">TAF1<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">P300<sup><a href="#cite9">[9]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">P300<a name="cite12_ref" id="cite12_ref"></a><sup><a href="#cite12">[12]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">P300<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">POU5F1<a name="cite10_ref" id="cite10_ref"></a><sup><a href="#cite10">[10]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">Pou5f1<sup><a href="#cite12">[12]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">Pou5f1<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">NANOG<sup><a href="#cite10">[10]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">Nanog<sup><a href="#cite12">[12]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">Nanog<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFCCFF">RNA-Seq<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#FFCCFF">RNA-Seq<sup><a href="#cite7">[7]</a></sup></td>
    <td align="center" valign="middle" bgcolor="#FFCCFF">RNA-Seq<sup><a href="#cite7">[7]</a></sup></td>
  </tr>
</table>
<p class="normaltext">For further comparison across different species, some unique tracks showing results from other groups have been included in CEpBrowser to enable better comparison and/or individual study purposes. These include two sets of differentiation experiment tracks, the hESC to hNEC (human nasal epithelial cells) differentiation results are retrieved from works published by Joanna Wysocka Lab<a name="cite13_ref" id="cite13_ref"></a><sup><a href="#cite13">[13]</a></sup> and mouse time-course differentiation results come from Zhong Lab<sup><a href="#cite7">[7]</a></sup>. The details of the unique tracks can be seen in the table below.</p>
<table width="90%" border="2" align="center" cellspacing="0" bgcolor="#FFFFCC" class="normaltext">
  <tr>
    <th width="10%" bgcolor="#003366" class="style1" scope="col">Species</th>
    <th width="20%" bgcolor="#003366" class="style1" scope="col">Track name</th>
    <th width="65%" bgcolor="#003366" class="style1" scope="col">Details</th>
    <th width="5%" bgcolor="#003366" class="style1" scope="col">Ref</th>
  </tr>
  <tr>
    <td width="10%" rowspan="9" align="center" valign="middle">Human<sup><a href="#cite7"></a></sup></td>
    <td width="20%" align="center" valign="middle">H3K4me3_ZS</td>
    <td width="65%" align="center" valign="middle">H3K4me3 binding in human ESC   from Zhong Lab. For comparative purposes.</td>
    <td width="5%" align="center" valign="middle"><a name="cite14_ref" id="cite14_ref"></a><sup><a href="#cite14">[14]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><p>H3K4me1_JW</p></td>
    <td align="center" valign="middle"><p>H3K4me1 binding in human ESC and NEC from Joanna Wysocka Lab.</p></td>
    <td width="5%" rowspan="8" align="center" valign="middle"><sup><a href="#cite13">[13]</a></sup></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">H3K27ac_JW</td>
    <td width="65%" align="center" valign="middle">H3K27ac binding in human ESC and NEC from Joanna Wysocka Lab.</td>
  </tr>
  <tr>
    <td align="center" valign="middle">H3K4me3_JW</td>
    <td align="center" valign="middle">H3K4me3 binding in human ESC and NEC from Joanna Wysocka Lab.</td>
  </tr>
  <tr>
    <td align="center" valign="middle">H3K27me3_JW</td>
    <td align="center" valign="middle">H3K27me3 binding in human ESC and NEC from Joanna Wysocka Lab.</td>
  </tr>
  <tr>
    <td align="center" valign="middle">p300_JW</td>
    <td align="center" valign="middle">P300 binding in human ESC and NEC from Joanna Wysocka Lab.</td>
  </tr>
  <tr>
    <td align="center" valign="middle">ESC_BRG1_JW</td>
    <td align="center" valign="middle">BRG1 binding in human ESC from Joanna Wysocka Lab.</td>
  </tr>
  <tr>
    <td align="center" valign="middle">ESC_FAIRE_JW</td>
    <td align="center" valign="middle">FAIRE binding in human ESC from Joanna Wysocka Lab.</td>
  </tr>
  <tr>
    <td align="center" valign="middle">Input_JW</td>
    <td align="center" valign="middle">Input  in human ESC and NEC from Joanna Wysocka Lab as control.</td>
  </tr>
  <tr>
    <td rowspan="16" align="center" valign="middle" bgcolor="#CCFFCC">mouse</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K4me1 Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K4me1 binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
    <td rowspan="12" align="center" valign="middle" bgcolor="#CCFFCC"><sup><a href="#cite7">[7]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K4me2 Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K4me2 binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K27ac Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K27ac binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K4me3 Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K4me3 binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K36me3 Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K36me3 binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K27me3 Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K27me3 binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K9me3 Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K9me3 binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H2A.Z Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H2A.Z binding in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">MeDIP Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">MeDIP in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">MRE Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">MRE in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">RNA Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">RNA profiling in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">IgGR Tm-Sr</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">IgGR control in   mouse ESC to definitive endoderm differentiation (Day 0, 4, 6).</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">P300_ZS</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">P300 binding in mouse ESC from Zhong Lab. For comparative purposes.</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC"><sup><a href="#cite14">[14]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K27ac_RJ</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">H3K27ac binding  in mouse ESC from Rudolf Jaenisch Lab.</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC"><a name="cite15_ref" id="cite15_ref"></a><sup><a href="#cite15">[15]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">RNA_SMG</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">Transcriptome profiling in mouse ESC from Sean M Grimmond Lab.</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC"><a name="cite16_ref" id="cite16_ref"></a><sup><a href="#cite16">[16]</a></sup></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CCFFCC">Pol2 binding</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC">Pol2 binding track by Zhong Lab. For comparative purposes.</td>
    <td align="center" valign="middle" bgcolor="#CCFFCC"><sup><a href="#cite14">[14]</a></sup></td>
  </tr>
</table>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="ENCODE" id="ENCODE"></a>ENCODE Datasets</p>
<div class="embededImage" id="encodeLogo"><img src="images/ENCODE_scaleup_logo.png" width="170" height="102" alt="ENCODE Logo" /></div>
<p class="normaltext">CEpBrowser has incorporated <a href="http://www.genome.gov/10005107" target="_blank">Encyclopedia of DNA Elements</a> (ENCODE) and mouseENCODE data to help in visualization and facilitating better insights from the vast amount data within the project.</p>
<p class="normaltext">To learn more about ENCODE and mouseENCODE, please check the following websites:</p>
<ul>
  <li class="style2"><a href="http://genome.ucsc.edu/encode/">ENCODE Project</a> and <a href="http://chromosome.sdsc.edu/mouse/download.html">mouseENCODE Project</a></li>
  <li class="style2">ENCODE Data Matrix (<a href="http://genome.ucsc.edu/encode/dataMatrix/encodeDataMatrixHuman.html">human</a> and <a href="http://genome.ucsc.edu/encode/dataMatrix/encodeDataMatrixMouse.html">mouse</a>)</li>
</ul>
<p class="Header1"><a href="#top"><img src="images/index.png" alt="to index" width="61" height="15" /></a><a name="usage" id="intro3"></a>Using CEpBrowser</p>
<p class="normaltext">CEpBrowser consists of four panels: <span class="panel">gene query</span> panel, <span class="panel">gene selection</span> panel, <span class="panel">navigation</span> panel, <span class="panel">visualization</span> panel and two folded panels: <span class="panel">track selection</span> panel (See figure below) and <span class="panel">track information &amp; settings</span> panel. The left panels can be folded so that all the panels can be accessible under smaller screen resolution. The entire left panel group can also be hidden to further provide space for the <span class="panel">visualization</span> panel.</p>
<p class="inlineImage"><img src="images/UI.png" alt="Comparative Genome Browser Interface" width="800" height="483" /><br />
  <strong>Comparative Genomic Browser interface</strong>. The <span class="panel">gene query</span> panel, <span class="panel">gene selection</span> panel, <span class="panel">navigation</span> panel, <span class="panel">visualization</span> panel and <span class="panel">track selection</span> panel are shown.</p>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="lookup" id="intro4"></a>Look up genes or provide  coordinates in <span class="panel">gene / region query</span> panel</p>
<div class="embededImage" id="GeneLookUp"> <img src="images/geneselection.png" alt="Gene Lookup Panel" width="270" height="158" /><br />
  <span class="panel"><strong>gene query</strong></span><strong> panel.</strong> Since partial name has been typed, a candidate box is shown.</div>
<p class="normaltext">To use CEpBrowser, the first step is to look the gene in interest up in the <span class="panel">gene query</span> panel (see figure to the right). </p>
<p class="normaltext">CEpBrowser employs AJAX to show a gene name candidate list (see the yellow box in the figure) when partial (at least 2 characters long) gene name is given.</p>
<p class="normaltext">The <strong>Species Selection</strong> boxes are used to select the species to visualize in the browser. Species name, the common name and database version are shown beside the boxes. At least two species need to be checked to continue and because the orthologous segment groups are anchored by human genome, human must be one of the checked. <em>Notice that because ENCODE data have only human and mouse coverage, <span class="panel">Species Selection</span> will not be available if ENCODE Datasets are selected.</em></p>
<div style="clear: both;"></div>
<div class="embededImage" id="GeneLookUp"><img src="images/regionselection.png" width="270" height="165" alt="Region query" /><br />
<span class="panel">region query</span>. It is now possible to select the region and provide a chromosome coordinate.</div>
<p class="normaltext"><strong>Updated:</strong> Now CEpBrowser can support input of genome coordinates to find the orthologous regions in the other species. To utilize this function, please select &quot;hg19 region&quot; / &quot;mm9 region&quot; / &quot;susScr2 region&quot; instead of &quot;Gene name&quot; and input coordinate into the text box (see figure to the right). CEpBrowser can take coordinate formats such as &quot;<span class="headerIndicator">chr1: 1234567-7654321</span>&quot; (blank spaces ignored for this format) or &quot;<span class="headerIndicator">chr1 1234567 7654321</span>&quot; (use space or tab for separation, multiple white-space characters will be treated as one).</p>
<p class="normaltext">If genome coordinates are used, <a href="#viewquery">the results in <span class="panel">Region Selection</span> panel</a> will be showing the orthologous regions instead of the genes within the coordinates specified.</p>
<p class="normaltext">The <strong>Track Selection &amp; Data Download</strong> button can be used to expand / collapse <span class="panel"><a href="#trackselection">Tracks &amp; Data</a></span><a href="#"> panel</a>.</p>
<p class="normaltext">After everything is set, click <strong>GO</strong> to continue.</p>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="viewquery" id="viewquery"></a>View query results in <span class="panel">region selection</span> panel</p>
<div class="embededImage" id="geneInformation"><img src="images/geneinformation.png" alt="Gene Information Panel" width="270" height="320" /><span class="panel"><strong>gene selection</strong></span><strong> panel.</strong> Two genes exist in human for POU5F1. Therefore, it's possible to choose the chromosome location in human to visualize by drop menu. The gene in pig does not have a name, so its Ensembl ID is shown.</div>
<p class="normaltext">After a query is submitted, the selected orthologous gene group will be shown in <span class="panel">gene selection</span> panel and will be instantly visualized in <span class="panel">visualization</span> panel as well. If partial gene name is provided as the query, all orthologous gene groups whose gene name in human partially match  the query (for example, &quot;POU5F1&quot; will match query &quot;pou&quot;, &quot;ou5f&quot;, <em>etc.</em> The match is case-insensitive.) will be shown. User will need to select which orthologous gene group to visualize.</p>
<p class="normaltext">The <span class="panel">gene selection</span> panel  shows the <strong>gene name</strong> in all selected species together with the <strong>chromosome locations</strong> (see figure to the right) for every matched orthologous gene group. For genes without a name in any species, the Ensembl ID will be shown instead. </p>
<p class="normaltext">If there are more than one gene context for one species in an orthologous group, there will be a drop-down menu for chromosome locations of the gene contexts in that species. By selecting the chromosome locations, user can specify which gene context to be visualized. Chromosome locations with an asterisk (*) means the corresponding gene context does not overlap with any orthologous segment group, <em>i.e.</em>, no colored regions will appear in visualization. The gene name in species will change if different gene context is selected.</p>
<p class="normaltext"><strong>Update: </strong>If you supplied genome coordinates, regions will be shown with names &quot;Region1&quot;, &quot;Region2&quot;, etc.</p>
<p class="normaltext">After the gene context is decided, click the corresponding <strong>Visualize</strong> button to visualize the orthologous gene group.</p>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="visualize" id="visualize"></a>Visualize the orthologous gene group in the <span class="panel">visualization</span> panel</p>
<div class="embededImage" id="colorPalette"><img src="images/colorpalette.jpg" alt="Color palette" width="200" height="12" /><br />
  <strong>The Color Palette.</strong> Note that Lighter and Darker colors are different.</div>
<p class="normaltext">In visualization of genes, a split vision of genomes of all the selected species is shown to compare the genomes in a side-by-side view. One orthologous segment group  within a gene context will be shaded in the same color. There are a total of 16 colors in CEpBrowser (see right) and if the number of orthologous segment groups is less than 16, every group will be assigned a unique color.</p>
<p class="normaltext">Because there may be multiple gene contexts within one orthologous gene group, it is likely that some color-shaded segment does not appear in one or more species. Select a different chromosome location in the <span class="panel">gene selection</span> panel may help to reveal the missing segments.</p>
<p class="normaltext">The genome browser is powered by UCSC Genome Browser so virtually all operations of UCSC Genome Browser can be conducted in any of the genomes in the <span class="panel">visualization</span> panel, such as zooming in/out, moving up/downstream and order the tracks by drag-and-drop. <strong>All tracks will be shown in a &quot;dense&quot; format, where darker means higher signal.</strong></p>
<table cellpadding="7" cellspacing="0" class="cautionTable">
  <tr>
    <td valign="middle" class="cautionText"><img src="images/caution.png" alt="Caution" width="40" height="36" /></td>
    <td valign="middle" class="cautionText"><ul>
        <li>Because of the limited height, take caution when using drag-and-drop to re-arrange the tracks.</li>
        <li>The <strong>Visualize</strong> button in the <span class="panel">gene selection</span> panel can always be used to reset the current view to the selected gene context.</li>
      </ul></td>
  </tr>
</table>
<p class="normaltext">In the cases when there are more than 16  orthologous segment regions within one gene context or when the orthologous segment region does not appear in some of the species, a track with all the name and the direction   of the Orthologous Segment Groups (&quot;Multi-species Alignment Track&quot;) is provided to the bottom of every species to help identifying the exact orthologous relationship across species (see figure below). </p>
<p class="inlineImage"><img src="images/orthogroupname.png" alt="Orthologous Segment Group" width="611" height="407" /><br />
  <span class="panel"><strong>Visualization</strong></span><strong> Panel and Multi-species Alignment Track.</strong> Species name and information are shown on top of every sub-panel (also collapsible via clicking the name). By clicking the blue buttons to the left of every track, <span class="panel">track information &amp; settings panel</span> will pop-up. Multi-species Alignment Track is on the bottom half of every sub-panel. This track contains information about all the orthologous segment groups. The groups with the same unique name  are orthologous  in all species and have the same color shade in all panels.</p>
<p class="normaltext"><a name="trackinfo" id="trackinfo"></a>If you want to see the track information, you can do so by clicking the blue button to the left of every track to open <span class="panel">track information &amp; settings</span> panel. The information includes data source, GEO accession number and references (if any).</p>
<p class="normaltext">The view for every individual species can be collapsed by clicking the species name if desired.</p>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="navigation" id="navigation"></a>Navigate CEpBrowser via <span class="panel">navigation</span> panel</p>
<div class="embededImage" id="Navigation"><img src="images/navigation.png" alt="Navigation Panel" width="270" height="164" /><br />
  <span class="panel"><strong>navigation</strong></span><strong> panel.</strong> Shown here are the MASTER CONTROL, which provide a synchronized navigation function, and all individual controls.</div>
<p class="normaltext">The <span class="panel">navigation</span> panel is provided to navigate through the selected orthologous gene group. The buttons in <strong>MASTER CONTROL</strong> is linked with all the buttons in individual species, to enable synchronized navigation, There are two types of controls in the navigation panel: sliding controls enable user to slide to the upstream / downstream region of the current view; zooming controls allow user to zoom in / out a certain part of the genome. The direction of sliding controls in MASTER CONTROL is regarding to the gene, therefore, if certain gene is on the Crick strand in one species (as is indicated near the gene name), going upstream in <strong>MASTER CONTROL</strong><em> will cause the view in that species moving right</em>.</p>
<table cellpadding="7" cellspacing="0" class="cautionTable">
  <tr>
    <td valign="middle" class="cautionText"><img src="images/caution.png" alt="Caution" width="40" height="36" /></td>
    <td valign="middle" class="cautionText"><ul>
        <li>As with UCSC Genome Browser, zooming out too much will have a negative impact on response time. Please proceed with caution.</li>
      </ul></td>
  </tr>
</table>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="trackselection" id="intro8"></a>Use <span class="panel">tracks &amp; data</span> panel to control the display of tracks and download data</p>
<p class="inlineImage"><img src="images/trackselection.png" alt="Tracks &amp; Data Panel" width="288" height="500" /> <img src="images/trackselectionencode.png" width="447" height="500" alt="Tracks &amp; Data ENCODE version" /><br />
  <span class="panel">tracks &amp; data</span> panel. Figure here is the panel with all tracks shown. To download the full data file for a specific file, click the <span class="panel">download file button</span> <img src="images/download.png" width="15" height="15" alt="Download file button" />, the download link and data file type is shown in the <span class="panel">download data</span> popup. Left: three-species data version; Right: ENCODE data version</p>
<div style="clear: both;"></div>
<div class="embededImage" id="SampleSelection"><img src="images/choosesampletype.png" width="293" height="300" alt="Choose sample type panel" /><br />
  <span class="panel"><strong>Choose sample type </strong></span><strong> panel.</strong> Every sample here will control all correpsonding tracks in <span class="panel"><strong>Tracks &amp; Data</strong></span><strong> panel</strong>.</div>
<p class="normaltext"><span class="panel">tracks &amp; data</span> panel is used to control which of the tracks will be shown in the browser. All tracks available to all species will be shown here and by checking the corresponding boxes, tracks can be made hidden to provide better focus. <strong>Common Tracks</strong> are tracks that exist in all species and <strong>Unique Tracks</strong> are the tracks that only exist in the selected species (many are replicated experiments to provide better comparison).</p>
<p class="normaltext">For ENCODE data sets, the sample type and lab for the data will be shown in a tabular format and <strong>Choose sample type</strong> button is used to enable users to select / deselect all tracks for the same sample (see figure to the right). </p>
<p class="normaltext">To download the full data used to display the tracks, please click the <span class="panel">download file button</span> to the right of every track, a <span class="panel">download data panel</span> will be popped up to provide the following information to every track component (there may be several of them in every track, especially the common ones): the link to the data file, the description of data (hover on the link to see) and the data type.</p>
<p class="normaltext"><strong>Reset View</strong> can be used to reset the views to their default, which will show all available tracks in their default order.</p>
<p class="normaltext">This panel is hidden by default and will be hidden after either resetting the view or applying changes in the settings.</p>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="trackinformation" id="trackinformation"></a>Show track information and adjust settings in <span class="panel">track information &amp; settings</span> panel </p>
<p class="normaltext">By clicking the blue button to the left of a track, <span class="panel">track information &amp; settings</span> panel will be shown with the UCSC Genome Browser settings page, including a detailed control over the tracks as well as the information of it. (See figure below.)</p>
<p class="inlineImage"><img src="images/trackinfo.png" alt="Orthologous Segment Group" width="622" height="391" /><br />
  <strong>Track Information &amp; Settings panel.</strong> This panel provides detailed settings for all the tracks as well as the information of the selected track.</p>
<p class="normaltext">This panel will be automatically hidden if the changes in settings are submitted. <strong>Close</strong> button can be used to close the panel without applying any changes in the settings.</p>
<p class="Header2"><a href="#top"><img src="images/index_sub.png" alt="to index" width="47" height="10" /></a><a name="datadownload" id="datadownload"></a>Use <span class="panel">Table Browser</span> panel to  download data within specific regions and access other services</p>
<p class="normaltext">By clicking <span class="panel">Table Browser</span> button to the right of <span class="panel">Visualization</span> panel, you will be able to access this new panel implemented by Table Browser of UCSC Genome Browser. (See figure below.)</p>
<p class="inlineImage"><img src="images/tablebrowser.png" alt="Orthologous Segment Group" width="638" height="437" /><br />
  <strong><span class="panel">Table Browser</span> panel.</strong> This panel, implemented by UCSC Table browser, provides controlled data downloading function together with other related functionarities.</p>
<p class="normaltext">This panel will provide you the function of downloading the data of regions of interest from all tracks shown in CEpBrowser. Data specific to CEpBrowser are available in &quot;Epigenomic Data from Zhong Lab and others&quot; group (as is seen in the figure). <span class="panel">Close</span> button can be used to close the panel.</p>
<p class="Header1"><a href="#top"><img src="images/index.png" alt="to index" width="61" height="15" /></a><a name="contact" id="intro9"></a>Contact Us</p>
<p class="normaltext">If you have any questions or comments regarding to Comparative Epigenome Browser, you may contact us by sending an email to Xiaoyi Cao (<a href='mailt&#111;&#58;x9%&#54;3%61o&#37;&#52;0%&#55;5&#99;s&#100;&#46;ed&#117;'>x9cao <strong>at</strong> ucsd <strong>dot</strong> edu</a>). </p>
<p class="Header1"><a href="#top"><img src="images/index.png" alt="to index" width="61" height="15" /></a><a name="reference" id="intro7"></a>References</p>
<ol class="normaltext">
  <li><a name="cite1" id="cite1"></a> <a href="#cite1_ref">↑</a>Kent WJ, <em>et al.</em> (2002) <a href="http://www.genome.org/cgi/content/abstract/12/6/996" target="_blank">The human genome browser at UCSC</a>. <em>Genome Research </em>12(6): 996-1006.</li>
  <li> <a name="cite2" id="cite2"></a> <a href="#cite2_ref">↑</a>Flicek P, <em>et al.</em> (2011) <a href="http://nar.oxfordjournals.org/content/39/suppl_1/D800.full" target="_blank">Ensembl 2011</a>. <em>Nucleic Acids Research</em> 39(suppl 1):D800-D806.</li>
  <li><a name="cite3" id="cite3"></a> <a href="#cite3_ref">↑</a>Hinrichs AS, <em>et al.</em> (2005) <a href="http://nar.oxfordjournals.org/content/34/suppl_1/D590.full">The UCSC Genome Browser Database: update 2006.</a> <em>Nucleic Acids  Research,</em> 34(suppl 1):D590-D598.</li>
  <li><a name="cite4" id="cite4"></a> <a href="#cite4_ref">↑</a>International Human Genome Sequencing Consortium (2001). <a href="http://www.nature.com/nature/journal/v409/n6822/abs/409860a0.html" target="_blank">Initial sequencing and analysis of the human genome</a>. <em>Nature,</em> 409: 860-921.</li>
  <li> <a name="cite5" id="cite5"></a> <a href="#cite5_ref">↑</a>Mouse Genome Sequencing Consortium (2002). <a href="http://www.nature.com/nature/mousegenome/" target="_blank">Initial sequencing and comparative analysis of the mouse genome</a>. <em>Nature</em>, 420, 520-562. </li>
  <li><a name="cite6" id="cite6"></a> <a href="#cite6_ref">↑</a>Bernstein BE, et al. (2010) <a href="http://www.nature.com/nbt/journal/v28/n10/abs/nbt1010-1045.html" target="_blank">The NIH Roadmap Epigenomics Mapping Consortium.</a> <em>Nature Biotechnology</em> 28(10):1045-1048.</li>
  <li><a name="cite7" id="cite7"></a><a href="#cite7_ref"> ↑</a>Xiao S, <em>et al.</em> (2012) <a href="http://www.sciencedirect.com/science/article/pii/S0092867412005740" target="_blank">Comparative Epigenomic Annotation of Regulatory DNA.</a> <em>Cell</em> 149(6):1381-1392.</li>
  <li><a name="cite8" id="cite8"></a><a href="#cite8_ref"> ↑</a>Harris RA, <em>et al.</em> (2010) <a href="http://www.nature.com/nbt/journal/v28/n10/full/nbt.1682.html" target="_blank">Comparison of sequencing-based methods to profile DNA methylation and identification of monoallelic epigenetic modifications.</a> <em>Nature Biotechnology</em> 28(10):1097-1105.</li>
  <li><a name="cite9" id="cite9"></a><a href="#cite9_ref"> ↑</a>Lister R, <em>et al.</em> (2009) <a href="http://www.nature.com/nature/journal/v462/n7271/abs/nature08514.html" target="_blank">Human DNA methylomes at base resolution show widespread epigenomic differences.</a> <em>Nature</em> 462(7271):315-322.</li>
  <li><a name="cite10" id="cite10"></a> <a href="#cite10_ref">↑</a>Kunarso G, <em>et al.</em> (2010) <a href="http://www.nature.com/ng/journal/v42/n7/abs/ng.600.html" target="_blank">Transposable elements have rewired the core regulatory network of human embryonic stem cells.</a> <em>Nature Genetics</em> 42(7):631-634.</li>
  <li><a name="cite11" id="cite11"></a> <a href="#cite11_ref">↑</a>Goren A, <em>et al.</em> (2010) <a href="http://www.nature.com/nmeth/journal/v7/n1/abs/nmeth.1404.html" target="_blank">Chromatin profiling by directly sequencing small quantities of immunoprecipitated DNA.</a> <em>Nature Methods</em> 7(1):47-49.</li>
  <li><a name="cite12" id="cite12"></a> <a href="#cite12_ref">↑</a>Chen X, <em>et al.</em> (2008) <a href="http://www.cell.com/abstract/S0092-8674(08)00617-X" target="_blank">Integration of External Signaling Pathways with the Core Transcriptional Network in Embryonic Stem Cells.</a> <em>Cell</em> 133(6):1106-1117.</li>
  <li><a name="cite13" id="cite13"></a> <a href="#cite13_ref">↑</a>Rada-Iglesias A, <em>et al.</em> (2011) <a href="http://www.nature.com/nature/journal/v470/n7333/full/nature09692.html" target="_blank">A unique chromatin signature uncovers early developmental enhancers in humans.</a> <em>Nature</em> 470(7333):279-283.</li>
  <li><a name="cite14" id="cite14"></a> <a href="#cite14_ref">↑</a>Xiao S, et al. unpublished data.</li>
  <li><a name="cite15" id="cite15"></a> <a href="#cite15_ref">↑</a>Creyghton MP, <em>et al.</em> (2010) <a href="http://www.pnas.org/content/107/50/21931.long" target="_blank">Histone H3K27ac separates active from poised enhancers and predicts developmental state.</a> <em>Proceedings of the National Academy of Sciences</em> 107(50):21931-21936.</li>
  <li><a name="cite16" id="cite16"></a> <a href="#cite16_ref">↑</a>Cloonan N, <em>et al.</em> (2008) <a href="http://www.nature.com/nmeth/journal/v5/n7/full/nmeth.1223.html" target="_blank">Stem cell transcriptome profiling via massive-scale mRNA sequencing.</a> <em>Nature methods</em> 5(7):613-619.<br />
  </li>
</ol>
</body>
</html>
