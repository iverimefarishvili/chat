<?php
$host="localhost";
$username="root";
$password="";
$databasename="mychat";

$connect=mysql_connect($host,$username,$password,$databasename);
$db=mysql_select_db($databasename);
$comment=$_POST['user_comm'];
$name=$_POST['user_name'];
if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  
  $x = "insert into comments (name,comment,post_time) values('$name','$comment',CURRENT_TIMESTAMP)";
  mysql_query($connect,$x);
}

?>