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
<?php 
include("config.php");
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"serv");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
 }
 session_start();
		
		$a=$_SESSION['username'];
$resu = mysqli_query($conn,"SELECT * FROM users   ");




	



?>

<body  dir="rtl" >

<ul>
  <li><a href="/serve/index.php" style="float:right">الرئيسية</a></li>
   <li><a href="/serve/admin.php" style="float:right"> اضافة عامل</a></li>
    
   <li><a href="/serve/mhna.php" style="float:right"> أضافة مهنة</a></li>
   
  
   <li><a href="/serve/se2.php" style="float:right">استعلام </a></li>
     <li><a href="/serve/se3.php" style="float:right"> استعلام عن المستخدمين </a></li>
         <li><a href="/serve/up1.php" style="float:right">تعديل بيانات </a></li>
    
    
  
</ul>


<div  class="lname">
<div  class="lname1">
  <form action="/serve/up1.php" method ="POST" >
    <label for="fname">الاسم</label>
    <select id="country" name="name">
        </br>
        <?php if (mysqli_num_rows($resu) >= 1) {
 $i=0; while($row = mysqli_fetch_array($resu)) { echo '<option value="'. $row["name"].'">'. $row["name"].'   </option>';}$i++;} ?>
       
      </select>	   
    <input type="submit" name ="save1" value="تعديل">
	
	<input type="submit" name ="save22" value="رجوع">
	
  </form>
  
</div></div>

</body>
</html>
<?php
include("config.php");

//$save = strip_tags(trim($_POST["save"]));

if(isset($_POST["save"])){
	




}

?>

<?php
//$save = strip_tags(trim($_POST["savee"]));

	//$name = strip_tags(trim($_POST["name"]));
	//	$name = strip_tags(trim());
		//	$name1 = strip_tags(trim($_POST["save1"]));
//$name2 = strip_tags(trim($_POST["save2"]));
	
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"serv");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

if( isset($_POST["save1"])){

	
	$name = strip_tags(trim($_POST["name"]));
	$result = mysqli_query($conn,"SELECT * FROM users where name LIKE '" . $name . "%' ");

if (mysqli_num_rows($result) >= 1) {
	$row = mysqli_fetch_array($result);
	
	$pp=$row["id"];
		$p=$row["name"];
	$row["name"]; 
     $row["password"];
     $row["phone"];
	  $row["email"];
	    $row["add"];
		  $row["eval"];
		   $row["mhna"];
		  
	echo '
	<div  class="lname">
	<div  class="lname1">
	<form action="/serve/up1.php" method ="POST"">
    <label for="fname">الاسم</label>
    <input type="text" id="fname" name="name1" value="'.$p.'" placeholder="الاسم">
	  <label for="fname">كلمة المرور</label>
    <input type="text" id="fname" name="name2" value="'.$row["password"].'" placeholder="الاسم">
	<label for="fname">الرقم </label>
	<input type="number"  name="id" value="'.$pp.'" placeholder="الاسم">
      <label for="fname"> الوصف</label>
    <Textarea  id="fname" name="des"   placeholder="." width="100%" >' . $row["des"].'</Textarea>
	</br>
	   <label for="fname"> العنوان</label>
    <Textarea  id="fname" name="add"   placeholder="." width="100%" >' . $row["add"].'</Textarea>
	</br>	</br>
	<label for="fname"> رقم الهاتف</label>
    <input type="number" id="fname" name="phone"   placeholder="." width="100%"  value="' . $row["phone"].'">
	</br>
	 	<label for="fname">المهنة</label>
    <input type="text" id="fname" name="mhna"   placeholder="." width="100%"  value="' . $row["mhna"].'">
	</br
	</br>
	
 
  
    <input type="submit" name ="save33" value="حفظ">
	 <input type="submit" name ="save34" value="حذف>
	
	
  </form>
  </div></div>
  ';
  
   
   
}  	
else {echo "<h1>no data</h1>";}
}	

	
if( isset($_POST["save33"])){
	$q=strip_tags(trim($_POST["name1"]));
	 $des = strip_tags(trim($_POST["des"]));
	 $pass = strip_tags(trim($_POST["name2"]));
	
	// $aw= strip_tags(trim($_POST["aw1"]));
	 
  
$add =strip_tags(trim($_POST["add"]));
//$agee = strip_tags(trim($_POST["age"]));
 
//
//$date = strip_tags(trim($_POST["date"]));
//$stat = strip_tags(trim($_POST["stat"]));
$id= strip_tags(trim($_POST["id"]));
$phone = strip_tags(trim($_POST["phone"]));
$mhna = strip_tags(trim($_POST["mhna"]));


//mysql_query(" UPDATE `sa` SET  ch='1' WHERE t ='$q'")or die("eroor");
	
mysqli_query($conn," UPDATE `users` SET  name='$q' , `phone`='$phone' ,`add`='$add' ,`password`='$pass' ,des='$des',`mhna`='$mhna' WHERE id ='$id'")or die("eroor");

echo" <h1>تم بنجاح</h1>";
  }
  else {
	 

  }
   if( isset($_POST["save34"])){
	$id= strip_tags(trim($_POST["id"]));

mysqli_query($conn," delete  from  `users` WHERE id ='$id'")or die("eroor");
echo" <h1>تم بنجاح</h1>";
	
}
	  
  

?>

