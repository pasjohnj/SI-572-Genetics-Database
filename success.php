<?php
require_once "db.php";
session_start();
?>

<html>
<head>
<!-- main style sheet -->
<link href = "style.css" media= "screen" rel="stylesheet" />
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
	<li id ="tab1" > <a href="upload.php" > Upload </a></li>
	<li id ="tab2"> <a href="query.php" > Query </a></li>
	</ul>
	</div>
	</div>
	</div>
<!-- END PAGE HEADER AND NAVIGATION -->

<!-- BEGIN PAGE CONTENT  -->
	<div class ="content">

<?php
if ( isset($_SESSION['success']) ) {
    echo '

    <p class="successful">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
    }
?>
<div class="success content">
<fieldset>
<p>You successfully uploaded your dataset</p> 
<p>You can now:</p>
<div id="links">
	<ul>
	<li> <a href="upload.php" > Upload Another Data Set. </a></li>
	<li> <a href="query.php" > Query the Database. </a></li>
	</ul>
	</div>
</fieldset>
</div>
</html>