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
    width: 80%;

	
	

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




?>

  <li><a href="/ka/index.php" style="float:right">الرئيسية</a></li>
   <li><a href="/ka/sal.php?kh=0" style="float:right"> طلبات جديدة</a></li>
    
   
  
   <li><a href="/ka/frist.php" style="float:right"> استعلام</a></li>
    
  
  
  
</ul>
<center> 
<h1>  الان يمكنكم التصفح والحجز بسهولة  </h1>

<?php 
include("config.php");
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"sala");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
 }

		//$a=$_SESSION['username'];
		
		$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"sala");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
}?>
<?php
include("config.php");

	 Session_Start();
  $name=  $_SESSION['username'] ;

//$save = strip_tags(trim($_POST["save"]));
		//$a=$_SESSION['username'];
$result = mysqli_query($conn,"SELECT * FROM hag where address LIKE '" . $name . "%' and test='2' ");
		
		?>
		
  
  <div  class="lname">
<div  class="lname1">
  <form action="/ka/frist.php?kh=0" method ="POST" >
    <label for="fname">الاسم</label>
	


		
    <select id="country" name="name">
        </br>
        
 <?php
$i=0;

	
	
while($row = mysqli_fetch_array($result)) {
?>
  <option value<?php echo $row["name"]; ?> ">  <?php echo $row["name"]; ?>  </option><?php }?>
      
      </select>	   
    
  
    <input type="submit" name ="savee" value="بحث">
	 	  
  </form>
  
</div>
</div>
<?php
if(isset($_POST["savee"])){
 
	$name = strip_tags(trim($_POST["name"]));
	
	
$result = mysqli_query($conn,"SELECT * FROM hag where address LIKE '" . $name . "%' and test='2' ");
$a=mysqli_num_rows($result);

if (mysqli_num_rows($result) >= 1) {
?>

  <table class="tb">
  
  <tr>
  <td style="	font-size:24px" > الرقم</td>
  
   <td style="	font-size:24px" > الاسم</td>
       <td style="	font-size:24px" > تاريخ الحجز</td>
	
	<td style="	font-size:24px" > رقم الهاتف </td>
	
  </tr>
  
<
<?php
$i=0;

	
	
while($row = mysqli_fetch_array($result)) {
?>
<tr>
  <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["dat"]; ?></td>
    
    <td><?php echo $row["phone"]; ?></td>
	<?php 
	$b=$row["id"];
	echo $b;
	?>
 <td><h3><a href="/ka/sal.php?kh=<?php echo $b; ?>">حذف</a></h3></td>
	
    
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else {
    echo "No result found";
}

$kh=strip_tags(trim($_GET["kh"]));
if($kh >=1){

 mysqli_query($conn,"DELETE FROM `hag` WHERE id='$kh' ");
 echo 'تم الحذف';


}
?>
<?php	
	
$resu = mysqli_query($conn,"SELECT * FROM users where address LIKE '" . $name . "%'    ");
while($row = mysqli_fetch_array($resu)) {
?>

<?php
echo '<h2  > اسم الصالة :   '.$row["name"].'</h2>'; 
echo '<h2> الموقع :   '.$row["address"].'</h2>'; 
echo '<h2> تفاصيل اخري :   '.$row["des"].'</h2>'; 

echo '<img src = "sa.JPG" width="1000"></br></br>';

	 
    $_SESSION['username'] = $row["name"];

echo '  </br><a class="e" href="/ka/reg.php"  background-color=" #4CAF50" font-size: 20px>احجز الان</a></li>';
}
}
?>


</center>



</body>
</html>


