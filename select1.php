<html dir="rtl">


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="m6.JPG"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
               <form action="/wjba/select1.php" method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
		  
            <p class="lead fw-normal mb-0 me-3">	
			<?php 
			session_start();
	 
   $name = $_SESSION['username'] ;
   $url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
}
$result = mysqli_query($conn,"SELECT * FROM users where `email` LIKE '" . $name. "%' ");

$row = mysqli_fetch_array($result);
 $_SESSION['phone']=$row["phone"] ;
 $_SESSION['name']=$row["name"] ;
  $_SESSION['add']=$row["add"] ;
   echo "welcome..." ,$row["name"]; 
	
	?></p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0"></p>
          </div>
<?php
          


	?></p>
	<center>
	
         </center>
		         </div>
<?php
          
$resu= mysqli_query($conn,"SELECT * FROM hag where `test` = '1' ");

	?></p>
	<center>
	<div width="100%">

<select id="country" name="name"
width="60%">
        </br>
        <?php if (mysqli_num_rows($resu) >= 1) {
 $i=0; while($row = mysqli_fetch_array($resu)) { echo '<option value="'. $row["nid"].'">'. $row["nid"].'   </option>';}$i++;} ?>
       
      </select>	  
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="save" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"> طلبات جديدة</button>
           
          </div>
		  <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="save2" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"> </button>
           
          </div>

        </form>
      </div>
    </div>
  </div>

</section>


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
if(isset($_POST["save"])){

	$name = strip_tags(trim($_POST["name"]));
	
$resu1 = mysqli_query($conn,"SELECT * FROM hag where   test = '1' or test = '2' ");
$row1 = mysqli_fetch_array($resu1);
	
$re = mysqli_query($conn,"SELECT * FROM custmer where   phone='$name' ");
$ro = mysqli_fetch_array($re);
echo '<cente><h2 style="color:red" > اسم مقدم الطلب '.$ro["name"].'  ......رقم الهاتف'.$ro["phone"].'... العنوان '.$ro["add"].'</h2></center>';

if($row1["test"]==1 or $row1["test"]==2 ){
$resu = mysqli_query($conn,"SELECT * FROM talb where   n_id='" .$name."' ");
$all=0;
while($row = mysqli_fetch_array($resu)) {
?>
<div  margin="10">
<center>
<?php
$_SESSION['id']=$row["id"] ;
echo '<h2  > رقم الصنف '.$row["id"].'</h2>';
echo '<h2  > رقم الطلب  '.$row["n_id"].'</h2>';
echo '<h2  >   اسم الوجبة'.$row["name"].'</h2>'; 
echo '<h2> السعر :   '.$row["sal"].'</h2>'; 
echo '<h2> احمالي الطلب :   '.$row["alls"].'</h2>'; 
$_SESSION['n_id']=$row["n_id"];
$k=$_SESSION['n_id'];
$all=$row["alls"]+$all;
echo '------------------------------------------------------------------------------';
}
if($row1["test"]==0){
echo '<h2> الحالة : قيد الانتظار:   '.$row["test"].' </h2>'; 
 }
 else if($row1["test"]==1){

echo '<h2 style="color:blue"> احمالي الفاتورة:   '.$all.' </h2>'; 
 }
 else if($row1["test"]==2){

echo '<h2 style="color:blue"> احمالي الفاتورة:   '.$all.' </h2>'; 
 }
 else if($row1["test"]==4){
echo '<h2>     حالة الطلب : تم رفض الطلب'.$row["test"].' </h2>'; 
 }
 
 else{
echo '<h2> حالة الطلب : تم التنفيذ:   '.$row["test"].' </h2>'; 
 }
 ?>
 <center>
 <form  action="/wjba/select2.php" method="post" >
 <input type="submit" name="re" value="تم الوصول"  class="btn btn-danger btn-lg"/>
  </form>
   <form  action="/wjba/select3.php" method="post" >
 
  <input type="submit" name="res" value="تم التسليم" class="btn btn-primary btn-lg"/>
</form>

   
   <?php
   	if(isset($_POST["re"])){


 header("location:select2.php");
 echo $k;}

 echo '<h2> ------------------------</h2>'; 

 if(isset($_POST["res"])){
 
  header("location:select2.php");
mysqli_query($conn,"UPDATE `hag` SET `test`='4' ")or die("eroor");
 
 }?>
 <?php
  if(isset($_POST["res1"])){
  
  echo $k;
  
 mysqli_query($conn," UPDATE `hag` SET  test='1' WHERE id ='$k' ")or die("eroor");

 
 }
  if(isset($_POST["done"])){
 echo $k=$_SESSION['id'];
 mysqli_query($conn," UPDATE `hag` SET  test='5' WHERE id ='$k'")or die("eroor");

 
 }
 
 
 }?>
</center>

<?php
 if (mysqli_num_rows($resu) == 0) {
 ?>
 <center>
 <?php
 echo '<h2> ليس هنالك طلبات    </h2>'; 
 ?>
 </center>
 <?php
 }
 }
	?>

<?php
if(isset($_POST["save2"])){
 
	
	
	
	
	
$resu = mysqli_query($conn,"SELECT * FROM hag where name2 LIKE '" .  $_SESSION['name'] . "%' and   test > '0' ");
while($row = mysqli_fetch_array($resu)) {
?>
<div  margin="10">
<center>
<?php
echo '<h2  > رقم الطلب  '.$row["id"].'</h2>';
echo '<h2  >  اسم العميل '.$row["name2"].'</h2>'; 
echo '<h2> الموقع :   '.$row["add"].'</h2>'; 
echo '<h2> تفاصيل اخري :   '.$row["des"].'</h2>'; 
if($row["test"]==0){
echo '<h2> الحالة : قيد الانتظار:   '.$row["test"].' </h2>'; 
 }
 else if($row["test"]==1){
echo '<h2> حالة الطلب : تم استلام الطلب الان متوجه نحوك:   '.$row["test"].' </h2>'; 
 }if($row["test"]==4){
echo '<h2>     حالة الطلب : تم رفض الطلب'.$row["test"].' </h2>'; 
 }
 
 else{
echo '<h2> حالة الطلب : تم التنفيذ:   '.$row["test"].' </h2>'; 
 }
 
 
 echo '<h2> ------------------------</h2>'; }
?></center>
<?php
 if (mysqli_num_rows($resu) == 0) {
 ?>
 <center>
 <?php
 echo '<h2> ليس هنالك طلبات    </h2>'; 
 ?>
 </center>
 <?php
 }}
?>