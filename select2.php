<?php
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
 session_start();
	 
	 $name= $_SESSION['n_id'];
	  mysqli_query($conn," UPDATE `hag` SET  test='2' WHERE nid ='$name'")or die("eroor");
	 echo $name;
	 header("location:select1.php");
?>