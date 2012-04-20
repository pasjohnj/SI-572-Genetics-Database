<?php
require_once "db.php";
session_start();
?>

<html>
<head>

<!-- show/hide login depending on logged in or not -->
<?php if ($_SESSION['username'])
	{
	echo "<style type='text/css'>
.formSection {display:inline;}
.notLoggedIn {display: none;}
</style> ";
	}
	else {
	echo "<style type='text/css'>
.formSection {display:none;}
.notLoggedIn {display:inline;}
</style> ";
	}
	?>
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
<!-- Session check for if user is logged in or out --> 
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

<!-- BEGIN STUFF ON THE LEFT-->
				<div class = "g306">
				<p>
				<span>
<!-- PHP FOR WELCOME MESSAGE NAME --> 
	<?php if ($_SESSION['username'])
	{
	echo "<p> <span>Welcome ";
	echo(htmlentities($_SESSION['username']));
	echo "!";
	}
	?>
				</span>
					<div class="notLoggedIn">
					<p>
					<span>Register </span>  
					Click here to enter your information and become a <a href="register.php" > new user</a>.
					</p>
					<p>
					<span>Already registered? </span> 
					Click here to <a href="login.php"> log in</a>. </br>
					</p>
				</div>
				<div class="clear">&nbsp;</div>
			</div>
<!-- END STUFF ON THE LEFT-->

<!-- ADD USER STUFF ON RIGHT-->
			<div class ="g612">

<?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>

				<fieldset><legend>Welcome to CardioGeniDB!</legend>
				<br>
				<p>CardioGeni is a database of publicly available results from genome-wide association studies (GWAS) involving
				traits related to cardiovascular disease and metabolic disorders such as blood pressure, body mass index, and type II diabetes.
				</p>

				<p>Follow the links to query data from the existing database, or upload your own data for others to query.
				</p>
				</fieldset>	

			</div >
			<div class="clear">&nbsp;</div>

<!-- BEGIN BOTTOM SECTION-->
			<div class="g918">
				<div id="line"></div> <br> </br>
				<fieldset>
				<p> 
				</br>
				There are currently three GWAS datasets on CardioGeni. These data are from the following references: </br> </br>
				Fasting Glucose:<br>
				(i) Saxena R et al. (2010) Genetic variation in GIPR influences the glucose and insulin responses to an oral glucose challenge. Nat Genet 42, 142-8.</br><br>
				Body Mass Index:<br>
				(ii) Speliotes, E.K., Willer, C.J., Berndt, S.I., Monda, K.L., Thorleifsson, G., Jackson, A.U., Allen, H.L., Lindgren, C.M., Luan, J., Magi, R., et al. (2010). Association analyses of 249,796 individuals reveal 18 new loci associated with body mass index. Nat Genet 42, 937-948.</br><br>
				Blood Pressure:<br>
				(iii) International Consortium for Blood Pressure Genome-Wide Association Studies et al. (2011) Genetic variants in novel pathways influence blood pressure and cardiovascular disease risk. Nature 478, 103-109.
				</p>

				<p> Data on glycaemic traits have been contributed by MAGIC investigators and have been downloaded from www.magicinvestigators.org 
				</p>
				<p>The CardioGeni logo was borrowed and adapted from the Gene Geni blog for academic use only. (http://my.biotechlife.net/2007/07/31/gene-genie-gets-a-logo/) 
				</p>
				</fieldset>
				<div id="line"></div>
				<p> 
				Amelia Mowry</br> Ellen Schmidt</br> John Pas</br> Kelly Grossmann
				</p>
				<p align="right"> Last Updated 4/3/2012 </p>
				</div>	

			<div class="clear">&nbsp;</div>
	

		</div>
<!-- END BOTTOM SECTION-->

	
	</div> 
<!-- end page content -->
			
</div >

</body>
</html>
