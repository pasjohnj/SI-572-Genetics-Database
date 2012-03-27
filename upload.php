<?php
require_once "db.php";
session_start();

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
	<div class="top">
	<div id ="name"><a href="index.php"><span>Home</span></a></div>
	<h1> CardioGeniDB</h1>	
	<div id="navcontainer">
	<ul id="tabmenu">
	<li id ="tab1" > <a href="#" class="active">Upload</a></li>
	<li id ="tab2"> <a href="query.php" >Query </a></li>
	<?php if ($_SESSION['username'])
	{
	echo "<p> <a href=\"logout.php\">Logout</a></p>";
	}
	?>
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
		Registered users may upload association study results files with a 
		maximum size limit of 20Mb. This allows for a gzipped text table including key columns 
		(marker name, p-value, standard error, effect size, and sample size) 
		for up to ~3 million SNPs.<br> <br>
		
		In addition to uploading your results file, please fill in the provided 
		metadata fields with the accompanying publication information.<br><br>
		
		Your uploaded results will be publicly accessible to everyone.
	</p>
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!-- ADD USER STUFF ON RIGHT-->
	<div class ="g612">

<!-- BEGIN UPLOAD STUFF -->

<div class="upload">
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
		readfile($_FILES['filename']['tmp_name']);
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
}else {
 
	print "<p>Upload your data.  <big>DO IT.</big></p>";
 
	print "<form enctype='multipart/form-data' action='upload.php' method='post'>";
 
	print "<p>File name to import:</p>";
 
	print "<input size='50' type='file' name='filename'><br />\n";
 
	print "<input type='submit' name='submit' value='Upload'></form>";
 
}
 
?>
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
