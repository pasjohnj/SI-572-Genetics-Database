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

echo "Welcome to CardioGeni!\n";
echo '<table border="1"> 
<tr><th>rsid</th><th>chr_hg18</th><th>pos_hg18</th><th>pval_GC_SBP</th><th>pval_GC_DBP</th></tr>'."\n";
$result = mysql_query("SELECT rsid, chr_hg18, pos_hg18, pval_GC_SBP, pval_GC_DBP FROM ICBP limit 10");
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
}
?>
</table>
<a href="add.php">Back to Homepage</a>
