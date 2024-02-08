<html dir="rtl">
<style>
ul {
	  list-style-type: none;
 padding: 12px 20px;
  margin: 8px 0;
  overflow: hidden;
  background-color: #FF66CC;
 
}

li {
  float: rtl;
 
  
  
}

li a {
	
 color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
}
a {
	
 background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
   background-color: #FA8072;
}


input[type=text], select , [type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: FFF5EB;;
  color:#000066;
  margin-top:10px;
  padding: 10px 10px;
  margin-left:400px;
  margin-right:90;
  font-size:20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
h1{margin:0 500px;
font-family:Arial, Helvetica, sans-serif;
color:#FA8072



}
input[type=submit]:hover {
   background-color: #FA8072;
}

body{ background-color:#FFFFFF;}



div.lname{
	width:100%
	height:100%
margin: 0 auto;	 
  border-radius: 5px;
 

}
label{font-size:20px;
font-family:Geneva, Arial, Helvetica, sans-serif;
color:#FFFFFF
;
}
 div.lname1{
 background-color:#FF66CC;
width:40%;	 

margin-top:5px;
margin: 0 auto;	 
 }
.button {
	dir="rtl"
 border-radius: 12px ;
  padding: 10px 138px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
   background-color: white;
  color: black;
  border: 2px solid #4CAF50; /* Green */
}
table {
	margin :0 auto;
	 padding: 20px;
     border-collapse: collapse;
	amily: arial, sans-serif;
    border: 5px solid green;
    width: 100%;

	
	

td, th {
 border: 1px solid;
    border: 4px solid green;
    text-align: left;
    
	padding: 20px;
  text-align: left;
  margin:5px;

}

tr:nth-child(even) {
    background-color: white;
	border: 4px solid green;
}


</style>
<body  dir="rtl" >
<ul>
<?php 
Session_Start();

Session_destroy();
unset($_SESSION);


?>

  <li><a href="/wjba/index.php" style="float:right">الرئيسية</a></li>
   <li><a href="/wjba/login.php" style="float:right">دخول </a></li>
    
 
  
  
</ul>
<div  class="lname">
<h1> شاشة تسجيل دخول المطعم</h1>
<div  class="lname1">

  <form action="/wjba/login.php" method ="POST">
    <label for="fname">الاسم</label></br>
    <input type="text" id="fname" name="name" value="" placeholder="الاسم" required></br>
	
       <label for="fname">كلمة السر</label></br>
    <input type="password" id="fname" name="ks"  value="" placeholder="" required></br>
	 
     <input type="submit" name ="save2" value="دخول">
	  
	
	
  </form>
   </div>


</body>
</html>
<?php
include("config.php");
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

//$save = strip_tags(trim($_POST["save"]));
unset($_SESSION);



if(isset($_POST["save"])){
	
    
	$nam =strip_tags(trim($_POST["name"]));
	
	if($nam!=null);{
		
	$name =strip_tags(trim($_POST["name"]));
$a =strip_tags(trim($_POST["ks"]));


$query_search = "select * from users where email = '".$nam."' AND password = '".$a. "'";
$query_exec = mysqli_query($conn,$query_search) or die(mysql_error());
$rows = mysqli_num_rows($query_exec);
$row = mysqli_fetch_array($query_exec );
//echo $rows;
 if($rows == 0) { 
 echo  "<h1>خطاء في اسم المستخدم او كلمة المرور</h1>";  // الرسالة الي تظهر في التطبيق - اسفل زر تسجيل الدخول - في حال إذا لم يتم ايجاد اسم المستخدم في القاعدة
 }
 else  {
	$na= $row["name"];
	 session_start();
	 
    $_SESSION['username'] = $na;
	echo  "<h1> التالية اذا اردت المتابعة</h1>" ;
	 
	echo '<h1><a href="/ka/sal.php?kh=0" style="float:center">التالي</a></h1>';
	//require("one.php");// الرسالة التي تظهر اسفل زر تسجيل الدخول في حال تم ايجاد اسم المستخدم .. لا تقم بتعديلها إلا اذا فهمتها, فهي مرتبطة برمجياً مع الكود الخاص بك
}

	
	
}
}
if(isset($_POST["save2"])){
	
    
	$name =strip_tags(trim($_POST["name"]));
	if($name!=null);{
		
	$name =strip_tags(trim($_POST["name"]));
$a =strip_tags(trim($_POST["ks"]));


$query_search = "select * from admin where admin = '".$name."' AND password = '".$a. "'";
$query_exec = mysqli_query($conn,$query_search) or die(mysql_error());
$rows = mysqli_num_rows($query_exec);
//echo $rows;
 if($rows == 0) { 
 echo  "<h1>خطاء في اسم المستخدم او كلمة المرور</h1>";  // الرسالة الي تظهر في التطبيق - اسفل زر تسجيل الدخول - في حال إذا لم يتم ايجاد اسم المستخدم في القاعدة
 }
 else  {
	
	 session_start();
	 
    $_SESSION['username'] = $name;
		header("location:admin.php");
		exit();
	
	//require("one.php");// الرسالة التي تظهر اسفل زر تسجيل الدخول في حال تم ايجاد اسم المستخدم .. لا تقم بتعديلها إلا اذا فهمتها, فهي مرتبطة برمجياً مع الكود الخاص بك
}

	
	
}
}
?>



