<?php
require_once "db.php";
session_start();

if (  isset($_POST['PMID']) && isset($_POST['First_author'])) {
	echo 'something';
	$PMID = mysql_real_escape_string($_POST['PMID']);
	$First_author = mysql_real_escape_string($_POST['First_author']);
	$journal = mysql_real_escape_string($_POST['journal']);
	$pub_year = mysql_real_escape_string($_POST['pub_year']);
	$title = mysql_real_escape_string($_POST['title']);
	$trait = mysql_real_escape_string($_POST['trait']);
	$sql = "INSERT INTO Publications (PMID, First_author, journal, pub_year, title, trait) VALUES ('$PMID', '$First_author', '$journal', '$pub_year', '$title', '$trait')";
	mysql_query($sql);
	echo 'blah';
	$_SESSION['success'] = 'Publication Added';

	return;
	}



/*Still to add:
-ability to strip away first line if it lists tab headings
-reject a file if it's not properly formatted
-add ability to upload files formatted for BMI and glucose
-reject a file if it's not properly formatted
-a better upload successful message: maybe give you go home/upload again/query
-Sync with the metadata stuff, make sure there are catches for required stuff
-pasj
*/

/*if (  isset($_POST['username']) && isset($_POST['password'])) {
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
if (!($_SESSION['username']))
	{
	header("Location: login.php");
	}*/
?>

<html>
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
<div class="secondaryNav">
	<?php if ($_SESSION['username'])
	{
	echo "<p> Logged in as: ";
	echo(htmlentities($_SESSION['username']));
	echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"logout.php\">Logout</a></p>";
	}
	?>
	</div>
	<div class="top">
	<div id ="name"><a href="index.php"><span>Home</span></a></div>
	<h1> CardioGeniDB</h1>	
	<div id="navcontainer">
	<ul id="tabmenu">
	<li id ="tab1" > <a href="#" class="active">Upload</a></li>
	<li id ="tab2"> <a href="query.php" >Query </a></li>
	
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
		<span>Upload your GWAS Results </span>  
		</br>You must be logged in to contribute. If you are not yet logged in, click <a href="login.php"> here</a> to log in. 
		If you are not yet a member, register <a href="register.php">here</a>. 
	</p>
	<p>
		Add to the database. Submit publication information and upload association study results files with a 
		maximum size limit of 20Mb. This allows for a gzipped text table including key columns 
		(marker name, p-value, standard error, effect size, and sample size) 
		for up to ~3 million SNPs.</p><p>
		
		In addition to uploading your results file, please fill in the provided 
		metadata fields with the accompanying publication information.</p><p>
		
		Your uploaded results will be publicly accessible to everyone.
	</p>
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!-- ADD USER STUFF ON RIGHT-->
	<div class ="g612">

<!-- BEGIN UPLOAD STUFF -->

<div class="upload">





<form enctype='multipart/form-data' action='upload.php' method='post'>
	<div class="fieldSet">

<fieldset>
<legend>Upload Data File</legend>
<p><label for "username">Please paste properly-formatted .csv file:
</br>
<?php
/*Necessary to ensure proper upload into the database of variously formatted csv
files -pasj*/
ini_set("auto_detect_line_endings", true);
//Upload File
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		/*The below displays the contents of the file, probably should not
		be kept, especially if the files are huge -pasj*/
		echo "<h2>Displaying contents:</h2>";
		/*readfile($_FILES['filename']['tmp_name']);*/
	}
 
	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
 
	while (($data = fgetcsv($handle, 49, ",")) !== FALSE) {
		$import="INSERT into lol(MarkerName,chr_hg18,pos_hg18,pval_GC_SBP,pval_GC_DBP) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
 
		mysql_query($import) or die(mysql_error());
	}
 
	fclose($handle);
 
	print "<p>Import done</p>";
 
	//view upload form
}
 
?>




<input size='50' type='file' name='filename'><br />

</br>
</label></p>
<!--<input type="submit" name="username" <?php 
	echo 'value="' .htmlentities($_POST['username']) .'"';
	?>></p>-->

</fieldset>
		<fieldset>
		<legend>Publication Information</legend>
<table class="form_table">
<tr><td>
		<label for "PMID">Pubmed ID:
</td><td>
		<input type="text" name="PMID" <?php 
	echo 'value="' .htmlentities($_POST['PMID']) .'"';
	?>></label>
</td><tr><td>
		<label for "First_author">First Author's Last Name, First Initials:</br>(Example: Speliotes, EK for EK Speliotes)  
</td><td>
<input type="text" name="First_author" <?php 
	echo 'value="' .htmlentities($_POST['First_author']) .'"';
	?>>
		</label>
</td></tr><tr><td>
		<label for "journal">Journal:
</td><td>
		<input type="text" name="journal" <?php 
	echo 'value="' .htmlentities($_POST['journal']) .'"';
	?>></label>
</td></tr><tr><td>
		<label for "pub_year">Year of publication: 
</td><td>
		<input type="text" name="pub_year" <?php 
	echo 'value="' .htmlentities($_POST['pub_year']) .'"';
	?>></label>
</td></tr><tr><td>
		<label for "trait">Trait: 
</td><td>
		<input type="text" name="trait" <?php 
	echo 'value="' .htmlentities($_POST['trait']) .'"';
	?>> </label>
</td>
</tr>
</table>

</fieldset>

</div>
<input type="submit" value="Upload" />
<input type="button" name="Cancel" value="Cancel" onclick="window.location = 'upload.php' " /> 
</form>
</div>

<!-- END UPLOAD STUFF -->

</div >
	<div class="clear">&nbsp;</div>


<!-- BEGIN BOTTOM SECTION-->
	<div class="g918">
	<div id="line"></div>
	</div>	

	<div class="clear">&nbsp;</div>
	

	</div>
<!-- END BOTTOM SECTION-->

	
	</div> 
<!-- end page content -->

			
</div >

</body>
</html>
