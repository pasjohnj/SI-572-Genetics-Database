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
<head>



<!-- main style sheet -->
<link href = "style.css" media= "screen" rel="stylesheet" />

<!-- some javascript we probably won't need -->
<script language="JavaScript" type="text/javascript" src="ahahLib.js"></script> 

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
	<li id ="tab1" > <a href="#" >Upload</a></li>
	<li id ="tab2"> <a href="#" class="active">Query </a></li>
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
		<span>Upload!</span>  
		Enter your data information on the form.
	</p>
	<p>
		<span>Need help?</span> 
		Try something else...
	</p>
	<div class="clear">&nbsp;</div>
	</div>
<!-- END STUFF ON THE LEFT-->

<!-- BEGIN STUFF ON THE RIGHT-->
	<div class ="g612">
	<p>Field 1: <input type="text" name=""></p>
	<p>Field 2: <input type="text" name=""></p>
	<p>Field 3: <input type="text" name=""></p>
	<p>Field 4: <input type="text" name=""></p>
	<input type="submit" name="">
	<div class="clear">&nbsp;</div>
	
<?php
echo '<table  border="1"> <br> 
<tr>
	<th>MarkerName</th>
	<th>chr_hg18</th>
	<th>pos_hg18</th>
	<th>pval_GC_SBP</th>
	<th>pval_GC_DBP</th>
</tr>'."\n";
$result = mysql_query("SELECT MarkerName, chr_hg18, pos_hg18, pval_GC_SBP, pval_GC_DBP FROM ICBP limit 10");
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
?>	
</table>

	</div>
<!-- END STUFF ON THE RIGHT-->

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

