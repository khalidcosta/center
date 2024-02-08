<html dir="rtl">


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="mhn.PNG"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="/serve/reg2.php" method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">اكمال الحجز</p>
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
<?php 
			session_start();
	 
   $name = $_SESSION['username'] ;
   $url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"serv");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
}?>
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
		            <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="name" class="form-control form-control-lg"
              placeholder="name" value="<?php echo $_SESSION['name']?>" />
            <label class="form-label" for="form3Example4">مقدم الطلب</label>
          </div>
         

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="number" id="form3Example4" name="phone" class="form-control form-control-lg"
              value="<?php echo $_SESSION['phone']?>" />
            <label class="form-label" for="form3Example4">phone</label>
          </div>
		            <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="add" class="form-control form-control-lg"
              value="<?php echo $_SESSION['add']?>"/>
            <label class="form-label" for="form3Example4">address</label>
          </div>
		    <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="des" class="form-control form-control-lg"
              placeholder=" "  />
            <label class="form-label" for="form3Example4">تفاصيل الطلب</label>
          </div>
		            <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="name2" class="form-control form-control-lg"
              placeholder="Enter password" value="<?php echo $_SESSION['name2']?>" />
            <label class="form-label" for="form3Example4">المرسل له</label>
          </div>
<div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="mhna" class="form-control form-control-lg"
              placeholder="Enter password" value="<?php echo $_SESSION['mhna']?>" />
            <label class="form-label" for="form3Example4">المهنة</label>
          </div>
         

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="sa" class="btn btn-primary btn-lg" 
              style="padding-left: 2.5rem; padding-right: 2.5rem;">تسجيل</button>
            <input type="submit" name ="save22" value="رجوع">
          </div>

        </form>
      </div>
    </div>
  </div>
  
    <!-- Copyright -->

    <!-- Right -->

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
$conn=mysqli_connect($url,$username,$password,"serv");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
}?>
<?php
if(isset($_POST["sa"])){
	$name =strip_tags(trim($_POST["name"]));
	if($name!=null);{
	$name =strip_tags(trim($_POST["name"]));
	$name2 =strip_tags(trim($_POST["name2"]));
 $mhna=strip_tags(trim($_POST["mhna"]));
 $phone =strip_tags(trim($_POST["phone"]));
 $des =strip_tags(trim($_POST["des"]));
 $add =strip_tags(trim($_POST["add"]));
 $email="mnb@mm.com";
	$date =date("d/m/y");	

$result = mysqli_query($conn,"SELECT * FROM custmer where `email` LIKE '" . $email. "%' ");
 echo mysqli_num_rows($result);	
	
	if (mysqli_num_rows($result) == 0) {
	$insert=mysqli_query($conn,"INSERT INTO `hag`(`name`, `name2`, `nid`, `test`, `phone`, `dat`, `des`, `serv`,`add`) VALUES
	 ( '$name', '$name2','0','0', '$phone', '$date', '$des','$mhna','$add') ") or die ("erroo");
	

	
	 echo '<h2 style="float:center"> done   </h2>';
	 	header("location:select.php");
	}
	else {echo "<h1 style='float:center'> عفوا الايميل موجود</h1>";
	
	
	}
	
	
}

}
if(isset($_POST["save22"])){
header("location:select.php");}
?>




