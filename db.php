<?php
$db = mysql_connect("localhost","ellenmschmidt", "zap");
if ( $db === FALSE ) die('Fail message');
if ( mysql_select_db("project") === FALSE ) die("Fail message");
?>