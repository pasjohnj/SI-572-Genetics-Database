<?php
require_once "db.php";
session_start();
?>


<html>
<head>

<!-- main style sheet -->
<link href = "style.css" media= "screen" rel="stylesheet" />

<!-- some javascript we probably won't need -->

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
		</br>Query for your variant of interest from the current database using the following fields.
		First select a trait, and then fill in one or more of the following fields to narrow your search to a single genetic variant.
	</p><p>
	<span>Example query: </span><br>
	rs13107325 is a SNP in the gene SLC39A8 on chromosome 4. Querying this SNP for different traits reveals that it has pleitropic effects for BMI (p=1.37e-07) and BP (p=2.57e-07).
	</p>
	<p>
	You may also query for your genomic region of interest by using a range of hg18 or hg19 positions.</p>
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!-- BEGIN STUFF ON RIGHT-->

	<div class ="g612">
<fieldset>
<legend>Select a single variant to query</legend>
<br></br>
<form method="POST">
<table class="form_table">
<tr>
	<td>
		<label>Trait:</label>
	</td>
	<td>
		<select name="trait">
		<option value="BMI">BMI</option>
		<option value="BP">BP</option>
		<option value="Fasting Glucose">Fasting Glucose</option>
		<option value="Fasting Proinsulin">Fasting Proinsulin</option>
		</select> 
	</td>
	<td >
	</td>

</tr>
<tr>
	<td>
		<label>MarkerName(rsID):</label>
	</td>
	<td>
		<input type="text" 
	       name="MarkerName" 
	       value="<?php echo htmlentities($_POST['MarkerName']);?>" >
	</td>
	<td>
	</td>
</tr>
<tr>
	<td>
		<label>Position (hg18):</label>
	</td>
	<td>
		<input type="text" name="pos_hg18"
		value= "<?php echo htmlentities($_POST['pos_hg18']);?>" >
	</td>
		<td>
	</td>
</tr>
<tr>
	<td>
		<label>Position (hg19):</label>
	</td>
	<td>
		<input type="text" name="pos_hg19"
		value= "<?php echo htmlentities($_POST['pos_hg19']);?>" >
	</td>
		<td>
	</td>
</tr>
<tr>
	<td>	
		<label>Chromosome:</label>
		
	</td>
	<td>
		<select name="chr">
		<option value="chr">chr</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		</select><span class="error">*</span>
		
	</td>
		<td>
	</td>
</tr>
<tr>
	<td>		
	</td>
	<td><span class="error">*Note: Selecting chromosome will output all SNPs on that chromosome.
		This query may take several minutes.</span>
	</td>
		<td>
	</td>
</tr>
</table>
<div class="buttons">
<input type="submit" value="Submit" name="Submit_Query1">
<input type="button" name="Cancel" value="Cancel" onclick="window.location = 'query.php' " /> 
</div>
</form>
</fieldset>

<fieldset>
<legend>Select a genomic range to query</legend>
<br></br>
<form method="POST">
<table class="form_table">
<tr>
<td>
	<label>Trait:</label>
</td>
<td>
	<select name="trait">
	<option value="BMI">BMI</option>
	<option value="BP">BP</option>
	<option value="Fasting Glucose">Fasting Glucose</option>
	<option value="Fasting Proinsulin">Fasting Proinsulin</option>
	</select>
</td>
<td>
</td>
</tr>
<tr>
<td>
	<label>Position (hg18) Range:</label>
</td>
<td>
	<input type="text" 
	name="pos_hg18_2"
	value= "<?php echo htmlentities($_POST['pos_hg18_2']);?>" > 
to
	<input type="text" 
	name="pos_hg18_3"
	value= "<?php echo htmlentities($_POST['pos_hg18_3']);?>"> 
</td>
<td>
</td>
</tr>
<tr>
<td>
	<label>Position (hg19) Range:</label>
</td>
<td>
	<input type="text" 
	name="pos_hg19_2"
	value= "<?php echo htmlentities($_POST['pos_hg19_2']);?>" > 
to
	<input type="text" 
	name="pos_hg19_3"
	value= "<?php echo htmlentities($_POST['pos_hg19_3']);?>"> 
</td>
<td>
</td>
</tr>
<tr>
<td><label>Chromosome:</label>
</td>
<td>
<select name="chr">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
</select>
</td>
<td>
</td>
</tr>
</table>
<div class="buttons">
<input type="submit" value="Submit" name="Submit_Query2">
<input type="button" name="Cancel" value="Cancel" onclick="window.location = 'query.php' " /> 
</div>

</form>
</fieldset>
</div >
</div>
	<div class="clear">&nbsp;</div>
	
<?php
if (  isset($_POST['Submit_Query1'])) {
	$markername = mysql_real_escape_string($_POST['MarkerName']);
	$pos_hg18 = mysql_real_escape_string($_POST['pos_hg18']);
	$pos_hg18_2 = mysql_real_escape_string($_POST['pos_hg18_2']);
	$pos_hg18_3 = mysql_real_escape_string($_POST['pos_hg18_3']);
	$pos_hg19 = mysql_real_escape_string($_POST['pos_hg19']);
	$chr = mysql_real_escape_string($_POST['chr']);
	$trait = mysql_real_escape_string($_POST['trait']);
	$sql = 
	"SELECT INFO.chr, INFO.pos_hg18, INFO.pos_hg19, INFO.MarkerName,
		results.p,trait,First_author,Journal,pub_year,title,Publications.PMID
		FROM INFO, results, Publications
		WHERE results.PMID = Publications.PMID AND
		results.MarkerName = INFO.MarkerName AND trait='$trait' AND
		(chr='$chr' OR INFO.pos_hg18 = '$pos_hg18' OR INFO.pos_hg19 = '$pos_hg19' OR INFO.MarkerName = '$markername')";
}	
if (  isset($_POST['Submit_Query2'])) {
	$markername = mysql_real_escape_string($_POST['MarkerName']);
	$pos_hg18 = mysql_real_escape_string($_POST['pos_hg18']);
	$pos_hg18_2 = mysql_real_escape_string($_POST['pos_hg18_2']);
	$pos_hg18_3 = mysql_real_escape_string($_POST['pos_hg18_3']);
	$pos_hg19 = mysql_real_escape_string($_POST['pos_hg19']);
	$pos_hg19_2 = mysql_real_escape_string($_POST['pos_hg19_2']);
	$pos_hg19_3 = mysql_real_escape_string($_POST['pos_hg19_3']);
	$chr = mysql_real_escape_string($_POST['chr']);
	$trait = mysql_real_escape_string($_POST['trait']);
	$sql = 
	"SELECT INFO.chr, INFO.pos_hg18, INFO.pos_hg19, INFO.MarkerName,
		results.p,trait,First_author,Journal,pub_year,title,Publications.PMID
		FROM INFO, results, Publications
		WHERE results.PMID = Publications.PMID AND
		results.MarkerName = INFO.MarkerName AND 
		trait='$trait' AND chr='$chr' AND
		(
		(INFO.pos_hg18 >= '$pos_hg18_2' AND INFO.pos_hg18 <= '$pos_hg18_3')
		OR
		(INFO.pos_hg18 >= '$pos_hg19_2' AND INFO.pos_hg18 <= '$pos_hg19_3')
		)";
}

if (isset($_POST['Submit_Query1']) OR isset($_POST['Submit_Query2'])){


$result = mysql_query($sql);
if ($num_rows = mysql_num_rows($result) == 0){
echo "Empty query";
}
elseif ($num_row = mysql_num_rows($result) !=0){
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
}


?>	

	
	</div> 
	
<!-- end page content -->

			
</div >

</body>
</html>