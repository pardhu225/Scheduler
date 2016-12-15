<?php
session_start();

$conn = new mysqli("127.0.0.1","root","","schedulerdb");
if(!$conn)
	die("Unable to connect to database in checklogin.php");

if(!isset($_POST['username']) || !isset($_POST['password']))
{
	echo '<script>window.location.assign("../index.php?q=1")';
	die();
}
//At this point we know that both username and password exist.  Next checking

$sql = 'SELECT * FROM users WHERE username = "'.$_POST['username'].'" AND password = "'.$_POST['password'].'"';

$res = $conn ->query($sql);
if($conn->error)
	die("SQL error in checklogin.php:".$conn->error);

if(!$res)
{
	echo 'window.location.assign("../index.php?q=2")';
	die();
}
?>
