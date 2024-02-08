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
	  mysqli_query($conn," DELETE from `hag`  WHERE nid ='$name'")or die("eroor");
	   mysqli_query($conn," DELETE from `talb`  WHERE n_id ='$name'")or die("eroor");
	 echo $name;
	 header("location:select1.php");
?>