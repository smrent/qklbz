<?php
$host="121.41.225.146";
$db_user="root";
$db_pass="3j4b7d7h3h";
$db_name="demo";
$timezone="Asia/Shanghai";

//$link=mysqli_connect($host,$db_user,$db_pass);
$mysqli = new mysqli($host,$db_user,$db_pass,$db_name);

//mysqli_select_db($db_name,$link);
$mysqli->query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间
?>
