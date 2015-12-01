<?php

// connect to database
mysql_connect("localhost","root","root") or die (mysql_error());
mysql_select_db("imageOscura") or die (mysql_error());

$id = addslashes($_REQUEST['id']);

$image = mysql_query("SELECT * FROM photos WHERE id=$id");
$image = mysql_fetch_assoc($image);
$image = $image['image'];


header("Content-type: image/jpeg");

echo $image;




?>