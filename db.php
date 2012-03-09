<?php
$db = mysql_connect("localhost","CardioGeni", "zap");
if ( $db === FALSE ) die('Fail message');
if ( mysql_select_db("project") === FALSE ) die("Fail message");
?>