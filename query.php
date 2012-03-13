<?php
require_once "db.php";
session_start();
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
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
	<div id ="name"></div>
	<h1> CardioGeniDB</h1>	
	<div id="navcontainer">
	<ul id="tabmenu">
	<li id ="tab1" > <a href="upload.php" >Upload</a></li>
	<li id ="tab2"> <a href="query.php" class="active">Query </a></li>
	</ul>
	</div>
	</div>
	</div>
<!-- END PAGE HEADER AND NAVIGATION -->

<!-- BEGIN PAGE CONTENT  -->
	<div class ="content">


<!-- BEGIN STUFF ON RIGHT-->
	<div class ="g612">

<p>Make a query</p>

<form method="post">
<p>MarkerName (rsID):
<input type="text" 
       name="MarkerName" 
       value="<?php echo htmlentities($_POST['MarkerName']);?>" > </p>
<p>Position (hg18):
<input type="text" name="pos_hg18"
	value= "<?php echo htmlentities($_POST['pos_hg18']);?>" > </p>
<p><input type="submit" value="Submit">
<a href="index.html">Cancel</a></p>
</form>

</div >
	<div class="clear">&nbsp;</div>
	
<?php
echo '<table  border="1"> <br> 
<tr>
	<th>MarkerName</th>
	<th>Chromosome</th>
	<th>Position (hg18)</th>
	<th>P-value (SBP)</th>
	<th>P-value (DBP)</th>
</tr>'."\n";

if (  isset($_POST['MarkerName']) && isset($_POST['pos_hg18'])) {
	echo "<!--\n$sql\n-->\n";
	$markername = mysql_real_escape_string($_POST['MarkerName']);
	$position = mysql_real_escape_string($_POST['pos_hg18']);
	$sql = "SELECT * FROM ICBP WHERE MarkerName='$markername'";
	/*$sql2= "SELECT * FROM ICBP WHERE pos_hg18='$position'";*/
	mysql_query($sql);
	$_SESSION['success'] = 'Successful Query';
	

$result = mysql_query($sql);
while ( $row = mysql_fetch_row($result) ) {
    echo "<tr><td>";
    echo(htmlentities($row[0]));
    echo("</td><td>");
    echo(htmlentities($row[1]));
    echo("</td><td>");
    echo(htmlentities($row[2]));
    echo("</td><td>");
    echo(htmlentities($row[3]));
    echo("</td><td>");
    echo(htmlentities($row[4]));
    echo("</td></tr>");
    }
}
?>	
	
<!-- BEGIN BOTTOM SECTION
	<div class="g918">
	<div id="line"></div>
	<p> 
	Amelia </br> Ellen </br> John </br> Kelly
	</p>
	</div>	



	<div class="clear">&nbsp;</div>
	

	</div>
	END BOTTOM SECTION-->

	
	</div> 
<!-- end page content -->

			
</div >

</body>
</html>