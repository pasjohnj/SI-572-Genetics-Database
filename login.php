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

<script type="text/javascript">
<!-- JAVASCRIPT FOR FORM VALIDATION -->
function Validate()
{
  var IsValid = true;

  document.getElementById("UserNameERR").innerHTML = "";
  document.getElementById("PasswordERR").innerHTML = "";

  // Check for a name
  if (document.getElementById("username").value == "") {
    document.getElementById("UserNameERR").innerHTML = "Missing name";
    IsValid = false;
  }
  // Check for an address
  if (document.getElementById("password").value == "") {
    document.getElementById("PasswordERR").innerHTML = "Missing password";
    IsValid = false;
  }	


  return IsValid;

}

</script>


<fieldset>
<legend>Please log in!</legend>
<?php
   if ( $row === FALSE ) {
      echo "<span class='error'>Username or password incorrect.</span>";
      unset($_SESSION['username']);
   } 
?>
<p>Log in here or <a href="register.php">register </a> to upload a dataset.</p>
<form name="MyForm" method="post" onsubmit="return Validate()"> 
<table class="form_table">
<tr>
<td>
	Username:
</td>
<td>
	<input type="text" name="username" id="username">
</td>
<td>
	<span class="error" id="UserNameERR" ></span>
</td>
</tr>
<tr>
<td> Password:
</td>
<td>
<input type="password" name="password" id="password">
</td>
<td>
	<span class="error" id="PasswordERR" ></span>
</td>
</tr>
</table>
<div class="buttons">
<input type="submit" value="Login"/>
<input type="reset" value="Clear Form"/>
</div>
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

	