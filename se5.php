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
 <li><a href="/wjba/index.php" style="float:right">الرئيسية</a></li>
    <li><a href="/wjba/mhna.php" style="float:right">  اضافة وجبة</a></li>
   <li><a href="/wjba/admin.php" style="float:right">اضافة موظف</a></li>
    
   <li><a href="/wjba/mhna.php" style="float:right"> أضافة وظيفة</a></li>
   
  
   <li><a href="/wjba/se2.php" style="float:right">طلب جديد </a></li>
     <li><a href="/wjba/se3.php" style="float:right">طلب مستلم </a></li>
	   <li><a href="/wjba/se5.php" style="float:right">متابعة طلب </a></li>
     <li><a href="/wjba/se3.php" style="float:right"> استعلام عن المستخدمين </a></li>
    
  
  
  
</ul>
<?php
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

$resu = mysqli_query($conn,"SELECT * FROM hag   ");
?>

<div  class="lname">
<div  class="lname1">
  <form action="/wjba/se5.php?kh=0" method ="POST" >
    <label for="fname">الاسم</label>
    <select id="country" name="name">
        </br>
        <?php if (mysqli_num_rows($resu) >= 1) {
 $i=0; while($row = mysqli_fetch_array($resu)) { echo '<option value="'. $row["nid"].'">'. $row["nid"].'   </option>';}$i++;} 
 session_start();
	 
    $_SESSION['ph'] =$row["nid"];
	echo  $_SESSION['ph'];
	?>
       
      </select>	   
    
  
    <input type="submit" name ="savee" value="بحث">
	 	  
  </form>
  
</div>
</div>
</body>
</html>

<?php
//$save = strip_tags(trim($_POST["savee"]));

	//$name = strip_tags(trim($_POST["name"]));
	//	$name = strip_tags(trim());
		//	$name1 = strip_tags(trim($_POST["save1"]));
//$name2 = strip_tags(trim($_POST["save2"]));
	
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

if(isset($_POST["savee"])){
	$name = strip_tags(trim($_POST["name"]));
	if(isset($_POST["savee"])){
		$name = strip_tags(trim($_POST["name"]));
		 
		
		//$a=$_SESSION['username'];
$result = mysqli_query($conn,"SELECT * FROM talb where n_id LIKE '" . $name . "%'  ");
$resul = mysqli_query($conn,"SELECT * FROM custmer where phone LIKE '" . $name . "%'  ");
	}
if(isset($_POST["save1"])){
		$name = strip_tags(trim($_POST["name"]));
$result = mysqli_query($conn,"SELECT * FROM t where test >= 1 and adress LIKE '" . $name . "%' ");}
if(isset($_POST["save2"])){
		$name = strip_tags(trim($_POST["name"]));
$result = mysqli_query($conn,"SELECT * FROM t where test = 0 and adress LIKE '" . $name . "%'");}
if(isset($_POST["save3"])){
		$name = strip_tags(trim($_POST["name"]));
$result = mysqli_query($conn,"SELECT * FROM t where adress LIKE '" . $name . "%' ");}
//else if(isset($name1)){
//	$result = mysqli_query($conn,"SELECT * FROM t where name LIKE '" . $name . "%' ");
	
//}
?>
<!DOCTYPE html>
<html>
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
 <head>
 <title> Retrive data</title>
 </head>
<body>


<div class="abc">
<?php

if (mysqli_num_rows($result) >= 1) {
?>

  <table class="tb">
  
  <tr>
  <td style="	font-size:24px" > الرقم</td>
  
   <td style="	font-size:24px" > اسم الوجبة</td>
      
	<td style="	font-size:24px" > رقم الطلب </td>
	<td style="	font-size:24px" > اجمالي </td>
	
  </tr>
  
<?php 
$kh=$_GET['kh'];

if($kh==0){
	
	
	?>
<?php
$i=0;

	
	$all=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
  <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["n_id"]; ?></td>
    <td><?php echo $row["alls"]; ?></td>
	<?php $all=$row["alls"]+$all;?>
   
</tr>
<?php
$i++;
}
?>
</table>
<?php


while($ro = mysqli_fetch_array($resul)) {
?>
<center>
<?php echo '<h2> الاسم : '.$ro["name"].'</h2>'; ?>
<?php echo '<h2> اجمالي السعر : '.$all.'</h2>'; ?>
<?php echo '<h2> رقم الهاتف :'.$ro["phone"].'</h2>'; ?>
 <?php
$_SESSION['phone']=$ro["phone"];?>
<?php 
echo'<form action="/wjba/se5.php?kh=0" method="POST">


<center>

            <button type="submit" name="sa" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"> </button>
           
           </center>
</form>';

?>
<?php
}?>

 <?php
 
}
else {
    echo "No result found";
}}
?>

</div>
 </body>
</html>
<?php
echo $h=$_SESSION['phone'];

	}
	


else {
	
	$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());

	
	}
	
if(isset($_POST["sa"])){
	 


	
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
	$a=$_SESSION['phone'];

 	  mysqli_query($conn," UPDATE `hag` SET  test='4' WHERE nid ='$a'")or die("eroor");

	 echo '<center><h2> تم استلام الطلب </h2></center>';

	
		}
	
	
	
	
}



	

