<html dir="rtl">


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="m6.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
               <form action="/wjba/mm.php" method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">تسجيل دخول الان</p>
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
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address"  name="email"/>
            <label class="form-label" for="form3Example3" name="email">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="pass" class="form-control form-control-lg"
              placeholder="Enter password" name="pass" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

         

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="save" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">دخول</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">ليس لدية حساب <a href="/wjba/reg1.php"
                class="link-danger">تسجيل حساب</a></p>
				
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
	
    
	$name =strip_tags(trim($_POST["email"]));
	if($name!=null);{
		
	$name =strip_tags(trim($_POST["email"]));
$a =strip_tags(trim($_POST["pass"]));


$query_search = "select * from custmer where `email` LIKE '" . $name. "%' AND password = '".$a. "'";
$query_exec = mysqli_query($conn,$query_search) or die(mysql_error());
$rows = mysqli_num_rows($query_exec);
//echo $rows;
 if($rows == 0) { 
 echo  "<h1>خطاء في اسم المستخدم او كلمة المرور</h1>";  // الرسالة الي تظهر في التطبيق - اسفل زر تسجيل الدخول - في حال إذا لم يتم ايجاد اسم المستخدم في القاعدة
 }
 else  {
	
	 session_start();
	 
    $_SESSION['username'] = $name;
		header("location:select.php?kh=-23");
		exit();
	
	//require("one.php");// الرسالة التي تظهر اسفل زر تسجيل الدخول في حال تم ايجاد اسم المستخدم .. لا تقم بتعديلها إلا اذا فهمتها, فهي مرتبطة برمجياً مع الكود الخاص بك
}

	
	
}
}
?>



