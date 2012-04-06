<?php
session_start();
require_once "db.php"; 

if ( isset($_POST['username']) && isset($_POST['password'])  ) {
   $username = mysql_real_escape_string($_POST['username']);
   $password = mysql_real_escape_string($_POST['password']);
   $sql = "SELECT username FROM users 
              WHERE username = '$username' AND password='$password'";
	/*echo "<!--\n$sql\n-->\n";*/
   $result = mysql_query($sql);
   $row = mysql_fetch_row($result);	
   if ( $row === FALSE ) {
      echo "<p>Login incorrect.</p>\n";
      unset($_SESSION['username']);
   } 
   else { 
      $_SESSION['username'] = $row[0];
	}
}
if ( $_SESSION['username'] ) {
   header( 'Location: upload.php');
   //echo('<p><a href="logout.html">Logout</a></p>'."\n");
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
	<div id ="name"><a href="index.php"><span>Home</span></a></div>
	<h1> CardioGeniDB</h1>	
	<div id="navcontainer">
	<ul id="tabmenu">
	<li id ="tab1" > <a href="#" >Upload</a></li>
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
		<span>Log in!</span>  </br>
		Enter your data information on the form.
	</p>
	<p>
		<span>Not registered?</span> 
		</br>Register <a href="register.php">here.</a>
	</p>
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!--LOGIN FORM-->
<div class= "g612">
<fieldset>
<legend>Please log in!</legend>
<p>Log in here or <a href="register.php">register </a> to upload a dataset.</p>
<form method="post">
<p>Username:
<input type="text" name="username"id="username" <?php 
	echo 'value="' .htmlentities($_POST['username']) .'"';
	?>><span id="UserNameERR" style="color:red"></span></p>
<p>Password:
<input type="password" name="password"id="password"<?php 
	echo 'value="' .htmlentities($_POST['password']) .'"';
	?>><span id="PasswordERR" style="color:red"></p>
<p><input type="submit" value="Login"/>
<a href="login.php">Refresh</a></p>
</form>
</fieldset>
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

	