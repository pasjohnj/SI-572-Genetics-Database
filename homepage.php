<?php
require_once "db.php";
session_start();

if (  isset($_POST['username']) && isset($_POST['password'])) {
	echo 'something';
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
	mysql_query($sql);
	echo 'blah';
	$_SESSION['success'] = 'User Added';
	header( 'Location: index.html' ) ;
	return;
	}
?>


<head>



<!-- main style sheet -->
<link href = "style.css" media= "screen" rel="stylesheet" />

<!-- some javascript we probably won't need -->
<script language="JavaScript" type="text/javascript" src="ahahLib.js"></script> 
<script language="JavaScript" type="text/javascript"> 
function makeactive(tab) { document.getElementById("tab1").className = ""; document.getElementById("tab2").className = ""; document.getElementById("tab3").className = ""; document.getElementById("tab"+tab).className = "active"; 
callAHAH('content.php?content= '+tab, 'content', 'getting content for tab '+tab+'. Wait...', 'Error'); } 
</script>
<title>CardioGeni</title>
</head>

<body>
<div class="main">
	<div class="page">
<!-- BEGIN PAGE HEADER AND NAVIGATION -->
	<div class="g918">	
	<div class="top">
	<div id ="name"></div>
	<h1> CardioGeniDB</h1>	
	<div id="navcontainer">
	<ul id="tabmenu">
	<li id ="tab1" > <a href="upload.php" >Upload</a></li>
	<li id ="tab2"> <a href="query.php" >Query</a></li>
	</ul>
	</div>
	</div>
	</div>
<!-- END PAGE HEADER AND NAVIGATION -->

<!-- BEGIN PAGE CONTENT  -->
	<div class ="content">

<!-- BEGIN STUFF ON THE LEFT-->
	<div class = "g306">
	<p>
		<span>Register!</span>  
		Enter your information on the form to become a new user!
		<input type="submit" value="Register"/>
		<a href="index.html">Cancel</a>
	</p>
	<p>
		<span>Already registered? </span> 
		Click here to log in. </br>
		<input type="submit" value="Login"/>
		<a href="index.html">Cancel</a>
	</p>
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!-- ADD USER STUFF ON RIGHT-->
	<div class ="g612">



<p>Welcome to CardioGeniDB!</p>

<p>CardioGeni is a database of publicly available results from genome-wide association studies (GWAS) involving
traits related to cardiovascular disease and metabolic disorders such as blood pressure, body mass index, and type II diabetes.</p>

<p>Follow the links to query data from the existing database, or upload your own data for others to query.</p>



<p> (i) Dupuis J et al, New genetic loci implicated in fasting glucose homeostasis and their impact on type 2 diabetes risk. Nat Genet. 2010;42:105-16, for data from the meta-analysis results for fasting glucose, fasting insulin, HOMA-IR and HOMA-B.</br>

(ii) Saxena R et al, Genetic variation in GIPR influences the glucose and insulin responses to an oral glucose challenge. Nat Genet. 2010:42:142-8 for data from the 2hr glucose GWAS.</br>

(iii) Soranzo N et al, Common variants at 10 genomic loci influence hemoglobin A1(C) levels via glycemic and nonglycemic pathways. Diabetes 2010: 59;12;3229-39 for HbA1c data. </br>

(iv) Strawbridge R et al, Genome-wide association identifies nine common variants associated with fasting proinsulin levels and provides new insights into the pathophysiology of type 2 diabetes for proinsulin data. Diabetes2011; 60;10;2624-2634 for proinsulin data.</br>

(v) Speliotes, E.K., Willer, C.J., Berndt, S.I., Monda, K.L., Thorleifsson, G., Jackson, A.U., Allen, H.L., Lindgren, C.M., Luan, J., Magi, R., et al. (2010). Association analyses of 249,796 individuals reveal 18 new loci associated with body mass index. Nat Genet 42, 937-948.</br>

(vi) International Consortium for Blood Pressure Genome-Wide Association Studies et al. (2011) Genetic variants in novel pathways influence blood pressure and cardiovascular disease risk. Nature 478, 103-109.</p>

<p>Data on glycaemic traits have been contributed by MAGIC investigators and have been downloaded from www.magicinvestigators.org</br>

</div >
	<div class="clear">&nbsp;</div>


<!-- BEGIN BOTTOM SECTION-->
	<div class="g918">
	<div id="line"></div> 
	<p> 
	</br>
References </br> </br>
(i) Dupuis J et al, New genetic loci implicated in fasting glucose homeostasis and their impact on type 2 diabetes risk. Nat Genet. 2010;42:105-16, for data from the meta-analysis results for fasting glucose, fasting insulin, HOMA-IR and HOMA-B.</br>

(ii) Saxena R et al, Genetic variation in GIPR influences the glucose and insulin responses to an oral glucose challenge. Nat Genet. 2010:42:142-8 for data from the 2hr glucose GWAS.</br>

(iii) Soranzo N et al, Common variants at 10 genomic loci influence hemoglobin A1(C) levels via glycemic and nonglycemic pathways. Diabetes 2010: 59;12;3229-39 for HbA1c data. </br>

(iv) Strawbridge R et al, Genome-wide association identifies nine common variants associated with fasting proinsulin levels and provides new insights into the pathophysiology of type 2 diabetes for proinsulin data. Diabetes2011; 60;10;2624-2634 for proinsulin data.</br>

(v) Speliotes, E.K., Willer, C.J., Berndt, S.I., Monda, K.L., Thorleifsson, G., Jackson, A.U., Allen, H.L., Lindgren, C.M., Luan, J., Magi, R., et al. (2010). Association analyses of 249,796 individuals reveal 18 new loci associated with body mass index. Nat Genet 42, 937-948.</br>

(vi) International Consortium for Blood Pressure Genome-Wide Association Studies et al. (2011) Genetic variants in novel pathways influence blood pressure and cardiovascular disease risk. Nature 478, 103-109.</p>

<p> Data on glycaemic traits have been contributed by MAGIC investigators and have been downloaded from www.magicinvestigators.org </p>

<div id="line"></div>
	<p> 
	Amelia </br> Ellen </br> John </br> Kelly
	</p>
	</div>	



	<div class="clear">&nbsp;</div>
	

	</div>
<!-- END BOTTOM SECTION-->

	
	</div> 
<!-- end page content -->

			
</div >

</body>
