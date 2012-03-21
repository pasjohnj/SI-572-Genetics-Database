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
if (!($_SESSION['username']))
	{
	header("Location: login.php");
	}
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
<p>Upload your data.  <big>DO IT.</big></p>

<form method="post">
<p>Please paste properly-formatted .csv file:</p>
<p>
<textarea name="username" cols="150" rows="50">
</textarea>
<!--<input type="submit" name="username" <?php 
	echo 'value="' .htmlentities($_POST['username']) .'"';
	?>></p>-->
<p><input type="submit" value="Upload"/>
<a href="index.php">Cancel</a></p>
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
