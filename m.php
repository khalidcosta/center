<html dir="rtl">
<style>
ul {
	  list-style-type: none;
 padding: 12px 20px;
  margin: 8px 0;
  overflow: hidden;
  background-color: 002366;
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
  background-color:FFF5EB;
  padding: 20px;
}
label{font-size:20px;
font-family:Geneva, Arial, Helvetica, sans-serif;
color:#FFFFFF
;
}
 div.lname1{
 background-color:0F52BA;
width:30%;	 
padding: 20px;
margin-top:10px;
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

 <li><a href="/ka/index.php" style="float:right">الرئيسية</a></li>
   <li><a href="/ka/reg.php" style="float:right">احجز الان </a></li>
    
   
  
   <li><a href="/ka/m.php" style="float:right">متابعة حجز</a></li>
    
  
 
  
  
</ul>
<center> 
<h1>  التاكيد ومتابعة الحجز  </h1>

<?php 
include("config.php");
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"sala");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
 }
 session_start();
		
		//$a=$_SESSION['username'];
		
		$resul = mysqli_query($conn,"SELECT * FROM hag   ");
		
		?>
		
  
  <div  class="lname">
<div  class="lname1">
  <form action="/ka/m.php?kh=0" method ="POST" >
    <label for="fname">ادخل رقم المتابعة</label>
    <input type="text" id="country" name="name">
        </br>
        
	
  
    <input type="submit" name ="savee" value="بحث">
	 	  
  </form>
  
</div>
</div>
<?php
if(isset($_POST["savee"])){
 
	$name = strip_tags(trim($_POST["name"]));
	
	echo $name;
	
	
$resu = mysqli_query($conn,"SELECT * FROM hag where id LIKE '" . $name . "%'    ");
while($row = mysqli_fetch_array($resu)) {
?>

<?php
echo '<h2  > اسم الصالة :   '.$row["address"].'</h2>'; 
echo '<h2> اسم الحاجز'.$row["name"].'</h2>'; 
echo '<h2> رقم الهاتف :   '.$row["phone"].'</h2>'; 

echo '<h2>تاريخ الحجز:   '.$row["dat"].'</h2>'; 

if($row["test"]==1){
echo '<h2>لم يتم تاكيد الحجز بعد</h2>'; 
}
else  if ($row["test"]==2){
echo '<h2>تم تاكيد الحجز</h2>';

}
	 
    $_SESSION['username'] = $row["name"];

echo '  </br><a class="e" href="/ka/m.php?kh='.$row["id"].'"  background-color=" #4CAF50" font-size: 20px>الغاء الحجز</a></li>';
 
}

}

$kh=strip_tags(trim($_GET["kh"]));
if($kh!=0){
echo $kh ;
mysqli_query($conn,"DELETE FROM `hag` WHERE id='$kh' ");
 echo 'تم الغا الحجز';
}
?>


</center>



</body>
</html>


