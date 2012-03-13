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
		<span>Register!</span>  
		
		Enter your information on the form to become a new user.
	</p>
	<p>
		<span>Already registered? </span> 
		Click here to <a href="login.php"> log in</a>.
	</p>
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!-- ADD USER STUFF ON RIGHT-->
	<div class ="g612">



<p>Add a new user account:</p>

<form method="post">
<p>Username:
<input type="text" name="username" <?php 
	echo 'value="' .htmlentities($_POST['username']) .'"';
	?>></p>
<p>Password:
<input type="password" name="password"<?php 
	echo 'value="' .htmlentities($_POST['password']) .'"';
	?>></p>
<p><input type="submit" value="Submit"/>
<a href="homepage.php">Cancel</a></p>
</form>

</div >
	<div class="clear">&nbsp;</div>


<!-- BEGIN BOTTOM SECTION-->
	<div class="g918">
	<div id="line"></div>
	<p> 
	Amelia  </br> Ellen </br>John </br>
	Kelly
	</p>
	</div>	



	<div class="clear">&nbsp;</div>
	

	</div>
<!-- END BOTTOM SECTION-->

	
	</div> 
<!-- end page content -->

			
</div >

</body>
