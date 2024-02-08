<html dir="rtl">


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="m6.PNG"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="/wjba/reg1.php" method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">تسجيل حساب الان</p>
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

          <!-- Email input -->
		            <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="name" class="form-control form-control-lg"
              placeholder="name" />
            <label class="form-label" for="form3Example4">name</label>
          </div>
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address"  name="email"/>
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="number" id="form3Example4" name="phone" class="form-control form-control-lg"
               />
            <label class="form-label" for="form3Example4">phone</label>
          </div>
		            <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="add" class="form-control form-control-lg"
              />
            <label class="form-label" for="form3Example4">address</label>
          </div>
		            <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="pass" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
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
$conn=mysqli_connect($url,$username,$password,"wjba");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
 
}?>
<?php
if(isset($_POST["sa"])){
	$name =strip_tags(trim($_POST["name"]));
	if($name!=null);{
	$name =strip_tags(trim($_POST["name"]));
 $email =strip_tags(trim($_POST["email"]));
 $phone =strip_tags(trim($_POST["phone"]));
 $pass =strip_tags(trim($_POST["pass"]));
 $add =strip_tags(trim($_POST["add"]));
 
	//$date =date("d/m/y");	

$result = mysqli_query($conn,"SELECT * FROM custmer where `email` LIKE '" . $email. "%' ");
 echo mysqli_num_rows($result);	
	
	if (mysqli_num_rows($result) == 0) {
	$insert=mysqli_query($conn,"INSERT INTO `custmer`(`name`, `phone`, `email`, `add`, `password`) VALUES
	 ( '$name', '$phone', '$email', '$add', '$pass') ") or die ("erroo");
	

	
	 echo '<h2 style="float:center"> done   </h2>';
	 	header("location:mm.php");
	}
	else {echo "<h1 style='float:center'> عفوا الايميل موجود</h1>";
	
	
	}
	
	
}

}
?>




