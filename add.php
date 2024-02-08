<html dir="rtl">
<style>
ul {
	  list-style-type: none;
 padding: 12px 20px;
  margin: 8px 0;
  overflow: hidden;
  background-color:#002366;
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
/* Change the link color to #111 (black) on hover */
li a:hover {
   background-color: #FA8072;
}


input[type=text], select , [type=password],[type=number]{
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



div {
	
margin: 0 auto;	 
  border-radius: 5px;
  background-color::#0033CC;
  padding: 20px;
}
label{font-size:20px;
font-family:Geneva, Arial, Helvetica, sans-serif;
color:#FFFFFF
;
}
 div.lname1{
 background-color:#8C8CFF;
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
	
    font-family: arial, sans-serif;
    border: 5px solid green;
    width: 56%;
	
	 background-color: :#0033CC;
	

td, th {

    border: 4px solid green;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
	border: 4px solid green;
}

<?php
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

$resu = mysqli_query($conn,"SELECT * FROM ser   ");
?>
</style>
<body  dir="rtl" >
<ul>

  <li><a href="/wjba/index.php" style="float:right">الرئيسية</a></li>
    <li><a href="/wjba/mhna.php" style="float:right">  اضافة وجبة</a></li>
   <li><a href="/wjba/admin.php" style="float:right">توصيل اضاف</a></li>
    
   <li><a href="/wjba/mhna.php" style="float:right"> أضافة وظيفة</a></li>
   
  
   <li><a href="/wjba/se2.php" style="float:right">استعلام </a></li>
     <li><a href="/wjba/se3.php" style="float:right"> استعلام عن المستخدمين </a></li>
    
  
    
  
</ul>

  
<center><h1> اضافة وجبة جديدة</h1></center>
<div  class="lname">

<div  class="lname1">
  <form action="/wjba/add.php" method ="POST"  enctype="multipart/form-data">
    <label for="fname"> الاسم </label></br>
    <input type="text" id="fname" name="title" value="" placeholder="الاسم" required></br>
	  
        
      <label for="country">  الوصف</label></br>
  <textarea id="w3review" name="des" cols="50">

</textarea>
	
	
        
   
	  
	</br>
	<label for="country">  السعر</label></br>
    <input type="text" name="nasher"  value="" placeholder="" required></br>

   

   
    
     

  </br>
  <input type="file" name="form_data" size="40"><br>
  
 


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
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
}?>
<?php


//$save = strip_tags(trim($_POST["save"]));

if(isset($_POST["save"])){
	$title =strip_tags(trim($_POST["title"]));
	if($title!=null);{
	$title =strip_tags(trim($_POST["title"]));
 //$i = $_FILES['form_data']['name'];
    //$form_data_size = $_FILES['form_data']['size'];
    //$ty = $_FILES['form_data']['type'];
   // $form_data = $_FILES['form_data']['tmp_name'];



$nasher =strip_tags(trim($_POST["nasher"]));

$i = $_FILES['form_data']['name'];
    $form_data_size = $_FILES['form_data']['size'];
    $ty = $_FILES['form_data']['type'];
    $form_data = $_FILES['form_data']['tmp_name'];



//$eval=  strip_tags(trim($_POST["eval"]));
//$mhna=  strip_tags(trim($_POST["mhna"]));
//$car=strip_tags(trim($_POST["cars"]));
$content=strip_tags(trim($_POST["des"]));
//$password=strip_tags(trim($_POST["pass"]));

//$date = strip_tags(trim($_POST["da"]));
//$email=strip_tags(trim($_POST["email"]));

	$date =date("d/m/y");	
	session_Start();
	  $name= $_SESSION['username'];


 
 
	
	
	$insert=mysqli_query($conn,"INSERT INTO `khabers`(  `title`, `content`,  `i_name`, `n_nasher`, `date`) VALUES
	 ( '$title',  '$content',  '$i','$nasher','$date') ") or die ("erroo");
	 move_uploaded_file($_FILES["form_data"]["tmp_name"],"upload/" . $_FILES["form_data"]["name"]);

	//$resu = mysqli_query($conn,"SELECT * FROM hag  ORDER BY id DESC LIMIT 1   ");
	//$row = mysqli_fetch_array($resu);
	
	 echo '<h2 style="float:center"> done   </h2>';
	
	
}
}

?>