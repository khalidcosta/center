<?php
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"serv");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
 session_start();
	 
	 $name= $_SESSION['id'];
	  mysqli_query($conn," UPDATE `hag` SET  test='5' WHERE id ='$name'")or die("eroor");
	 echo $name;
	 header("location:select1.php");
?>