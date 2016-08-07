<?
session_start();
$connection = mysql_connect("localhost","root","") or die("Unable to connect");
mysql_select_db("ImageChat")or die("Unable to select DB");
?>