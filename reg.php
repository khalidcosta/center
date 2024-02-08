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

  
  <li><a href="/ka/index.php" style="float:right">الرئيسية</a></li>
   <li><a href="/ka/reg.php" style="float:right">احجز الان </a></li>
    
   
  
   <li><a href="/ka/m.php" style="float:right">متابعة حجز</a></li>
    
  
</ul>
<div  class="lname">

<div  class="lname1">
  <form action="/ka/reg.php" method ="POST">
    <label for="fname">الاسم</label></br>
    <input type="text" id="fname" name="name" value="" placeholder="الاسم" required></br>
	
      
	
	<label for="country"> رقم الهاتف</label></br>
    <input type="text" id="fname" name="phone"  value="" placeholder="" required></br>

   <label for="country"> تاريخ الحجز</label></br>
    <input type="date" id="fname" name="da"  value="" placeholder="" required></br>

   

   
    
     
    </select>
  </br>
  


    <input type="submit" name ="save" value="حفظ">
	
	
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
$conn=mysqli_connect($url,$username,$password,"sala");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
}?>
<?php
include("config.php");
session_start();
	 
  $ad=  $_SESSION['username'] ;

//$save = strip_tags(trim($_POST["save"]));

if(isset($_POST["save"])){

	$name =strip_tags(trim($_POST["name"]));
	if($name!=null);{
	$name =strip_tags(trim($_POST["name"]));



$phone =strip_tags(trim($_POST["phone"]));

$add=  $_SESSION['username'] ;

$date = strip_tags(trim($_POST["da"]));

	//$date =date("d/m/y");	

$result = mysqli_query($conn,"SELECT * FROM hag where dat LIKE '" . $date. "%' ");
 echo mysqli_num_rows($result);	
	
	if (mysqli_num_rows($result) == 0) {
	$insert=mysqli_query($conn,"INSERT INTO `hag`( `name`, `phone`, `address`, `sala`, `dat`, `test` ) VALUES
	 ( '$name',  '$phone',   '$add',  '200000','$date','1') ") or die ("erroo");

	$resu = mysqli_query($conn,"SELECT * FROM hag  ORDER BY id DESC LIMIT 1   ");
	$row = mysqli_fetch_array($resu);
	
	 echo '<h2 style="float:center"> تم بنجاح رقم المتابعة هو :   '.$row["id"].'</h2>';
	}
	else {echo "<h1 style='float:center'>عفوا محجوز التاريخ</h1>";
	
	
	}
	
	
}
}

?>




