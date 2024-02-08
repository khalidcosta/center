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
               <form action="/wjba/select.php?kh=0" method="POST">
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
$result = mysqli_query($conn,"SELECT * FROM custmer where `email` LIKE '" . $name. "%' ");

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
          
$resu= mysqli_query($conn,"SELECT * FROM khabers ");

	?></p>
	<center>
	<div width="100%">
<select id="country" name="name"
width="60%">
        </br>
        <?php if (mysqli_num_rows($resu) >= 1) {
 $i=0; while($row = mysqli_fetch_array($resu)) { echo '<option value="'. $row["title"].'">'. $row["title"].'   </option>';}$i++;} ?>
       
      </select>	  
</div>
         </center>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="save" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"> ادراج</button>
           
          </div>
		  <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="save2" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"> متابعة طلب سابق</button>
           
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
	
	
	
	
$resu = mysqli_query($conn,"SELECT * FROM khabers where title LIKE '" . $name . "%'    ");
while($row = mysqli_fetch_array($resu)) {
?>
<div  margin="10">
<center>
<?php
echo '<img src = "upload/'.$row["i_name"].'"  width="300" height="150"></br></br>';
echo '<h2  > الاسم  '.$row["title"].'</h2>'; 
 $_SESSION['title']=$row["title"] ;

echo '<h2> تفاصيل اخري :   '.$row["content"].'</h2>'; 
echo '<h2> السعر:   '.$row["n_nasher"].' نجوم</h2>'; 
 $_SESSION['sal']=$row["n_nasher"] ;
echo  '<form action="/wjba/select.php?kh=-24" method="POST">
<label> العدد</label>
<input type="number" name="nid" value="1"></br>
<center>

            <button type="submit" name="save1" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">  اضافة الي السلة</button>
           
           </center>
</form>';
 
?>
</center>
<center>
<?php
//echo '<img src = "upload/'.$row["imag"].'"  width="80%" height="200"></br></br>';

	 
   
?>
</center>


 


<?php
echo '-----------------------';
?>
</div>
<?php
}
}
?>

<?php
if(isset($_POST["save2"])){
 
	
	



	
	
$resu = mysqli_query($conn,"SELECT * FROM hag where name LIKE '" .  $_SESSION['name'] . "%' and   test >= '0' ");
while($row = mysqli_fetch_array($resu)) {
?>
<div  margin="10">
<center>
<?php
echo '<h2  > رقم الطلب  '.$row["id"].'</h2>';
echo '<h2  > اسم السايق  '.$row["name2"].'</h2>'; 
echo '<h2> الفاتورة :   '.$row["add"].'</h2>'; 
echo '<h2> تفاصيل اخري :   '.$row["des"].'</h2>'; 
if($row["test"]==0){
echo '<h2> الحالة : قيد الانتظار:   '.$row["test"].' </h2>'; 
 }
 else if($row["test"]==1){
echo '<h2> حالة الطلب : تم استلام الطلب الان متوجه نحوك:   '.$row["test"].' </h2>'; 
 }else if($row["test"]==4){
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
 echo '<h2>    </h2>'; 
 ?>
 </center>
 <?php
 }}
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
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

if(isset($_POST["save1"])){
	$a=$_SESSION['title'];
	$phone=$_SESSION['phone'];
	$sal=$_SESSION['sal'];
$n_id = $_POST["nid"];
$_SESSION['n_id']=$n_id;
$alls=$_SESSION['sal']*$n_id;
$insert=mysqli_query($conn,"INSERT INTO `talb`(`name`, `n_id`, `sal`, `alls`) VALUES
	 ( '$a', '$phone', '$sal', '$alls') ") or die ("erroo");
	

	echo " تم رفع الطلبات";
		$kh=-3;}

		
?>
	<?php	//$a=$_SESSION['username'];
	
	$kh=-1;

if($kh==-1){
		$phone=$_SESSION['phone'];
$result = mysqli_query($conn,"SELECT * FROM talb  where n_id = '$phone '  ");
$re = mysqli_query($conn,"SELECT * FROM hag  where nid = '$phone '  ");
	?>
<div class="abc">
<?php
if (mysqli_num_rows($result) >= 1) {
 
?>

  <table class="tb">
  
  <tr>
  <td style="	font-size:24px" >  رقم الطلب</td>
    <td style="	font-size:24px" >  الطلب</td>
   <td style="	font-size:24px" >السعر </td>
       
	
	<td style="	font-size:24px" > الاجمالي </td>
	<td style="	font-size:24px" >  حذف</td>
	
  </tr>
  
<?php 


	
	
	?>
<?php
$i=0;

	
	$all=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>

    <td><?php echo $row["n_id"]; ?></td>
	    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["sal"]; ?></td>
	
    <td><?php echo $row["alls"];
$all=$row["alls"]+$all;

	?></td>
	<td> <li><a href="/wjba/select.php?kh=<?php echo $row["id"]; ?>" style="float:right"> حذف</a></li></td>
   
       
</tr>
<?php
$i++;
}
?>
</table>
 <?php
 echo' <h2 style="color:blue">الاجمالي = '.$all.'<h2>';
 $_SESSION['all']=$all;
  if (mysqli_num_rows($re) >= 1) {
 $ro= mysqli_fetch_array($re);
 
 if($ro["test"]==0){
 echo "قيد انتظار قبول الطلب";}
 else if($ro["test"]==1){
 echo "تم قبول الطلب";}
 else if($ro["test"]==2){
 echo "السايق عند الباب";}
 else
 {
 echo "no";
 }
 }
 echo'<form action="/wjba/select.php?kh=-26" method="POST">


<center>

            <button type="submit" name="sa" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"> طلب</button>
           
           </center>
</form>';

if(isset($_POST["sa"])){
	
$h=$_SESSION['phone'];

	



$insert=mysqli_query($conn,"INSERT INTO `hag`(`nid`) VALUES
	 ( '$h') ") or die ("erroo");
	

	
		}
}
 
	
else {
    
}}
?>
<?php

$kh=$_GET['kh'];

if($kh>=1){
  mysqli_query($conn," DELETE from `talb`  WHERE id ='$kh'")or die("eroor");
  $kh=-1;

}
?>

</div>
 </body>
</html>

	