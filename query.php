<?php
require_once "db.php";
session_start();
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
	<li id ="tab1" > <a href="upload.php" >Upload</a></li>
	<li id ="tab2"> <a href="query.php" class="active">Query </a></li>
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
		<span>Query GWAS data </span>  
		</br>Use the provided fields to query the existing database for your variant of interest. 
	</p>
	
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!-- BEGIN STUFF ON RIGHT-->

	<div class ="g612">
<fieldset>
<legend>Query</legend>
<p>Query data from the current database using one or more of the following fields:</p>

<form method="post">
<p>MarkerName (rsID):
<input type="text" 
       name="MarkerName" 
       value="<?php echo htmlentities($_POST['MarkerName']);?>" > </p>
<p>Chromosome:
<select name="chr">
	<option value="<?php echo htmlentities($_POST['chr']);?>">1</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">2</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">3</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">4</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">5</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">6</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">7</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">8</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">9</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">10</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">11</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">12</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">13</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">14</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">15</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">16</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">17</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">18</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">19</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">20</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">21</option>
	<option value="<?php echo htmlentities($_POST['chr']);?>">22</option>
</select> </p>
<p>Position (hg18):
<input type="text" name="pos_hg18"
	value= "<?php echo htmlentities($_POST['pos_hg18']);?>" > </p>
<p>Position (hg19):
	<input type="text" name="pos_hg19"
	value= "<?php echo htmlentities($_POST['pos_hg19']);?>" > </p>
<p><input type="submit" value="Submit">
<input type="button" name="Cancel" value="Cancel" onclick="window.location = 'query.php' " /> 

</p>
</form>
</fieldset>
</div >
</div>
	<div class="clear">&nbsp;</div>
	
<?php
if (  isset($_POST['MarkerName']) && isset($_POST['pos_hg18']) && isset($_POST['pos_hg19']) && isset($_POST['chr'])) {
	$markername = mysql_real_escape_string($_POST['MarkerName']);
	$pos_hg18 = mysql_real_escape_string($_POST['pos_hg18']);
	$pos_hg19 = mysql_real_escape_string($_POST['pos_hg19']);
	$chr = mysql_real_escape_string($_POST['chr']);
	$sql = 
	"SELECT chr, INFO.pos_hg18, INFO.pos_hg19, INFO.MarkerName,
		BMI.p,trait,First_author,Journal,pub_year,title,Publications.PMID
		FROM INFO, BMI, Publications
		WHERE BMI.PMID = Publications.PMID AND
		BMI.MarkerName = INFO.MarkerName AND
		(INFO.chr= '$chr' OR INFO.pos_hg18 = '$pos_hg18' OR INFO.pos_hg19 = '$pos_hg19' OR INFO.MarkerName = '$markername')";
	echo '<table  border="1"> <br> 
<tr>
	<th>Chr</th>
	<th>Position (hg18)</th>
	<th>Position (hg19)</th>
	<th>MarkerName</th>
	<th>Association P-value</th>
	<th>Trait</th>
	<th>First Author</th>
	<th>Journal</th>
	<th>Publication Year</th>
	<th>Publication Title</th>
	<th>PMID</th>
</tr>'."\n";
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
    echo("</td><td>");
    echo(htmlentities($row[5]));
    echo("</td><td>");
    echo(htmlentities($row[6]));
    echo("</td><td>");
    echo(htmlentities($row[7]));
    echo("</td><td>");
    echo(htmlentities($row[8]));
    echo("</td><td>");
    echo(htmlentities($row[9]));
    echo("</td><td>");
    echo(htmlentities($row[10]));
    echo("</td></tr>");
    }	
}
?>	

	
	</div> 
	
<!-- end page content -->

			
</div >

</body>
</html>