<!DOCTYPE <html>
<html dir="rtl">
    <meta charset="UTF8">
<head>
    <title>حساب کاربری</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/4eb0ea4e39.js" crossorigin="anonymous"></script>
        <script src="../js/city.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    @font-face{
        font-family: 'nasim';
        src: url("font/Nasim.otf");
    }
    body{
        font-family: nasim;
    }
    h2{
        font-family: nasim;
    }
</style>    
<body>
    <?php
    
    include_once 'function.php';
    include_once 'db.php';
   
      $user = $_SESSION['customer_email'];
      $select_user = "SELECT * FROM customer WHERE customer_email='$user'";
      $run_custom = mysqli_query($con,"SET NAMES utf8");
      $run_custom = mysqli_query($con,"SET CHARACTER SET utf8");
      $run_custom = mysqli_query($con, $select_user);
      $row_custom = mysqli_fetch_array($run_custom);
      $id = $row_custom['customer_id'];
	  $name = $row_custom['customer_name'];
	  $lastname = $row_custom['customer_lastname'];
	  $gender = $row_custom['customer_gender'];
	 
  	  $email = $row_custom['customer_email'];
	  $province = $row_custom['customer_province'];
	  $city = $row_custom['customer_city'];
	  $address = $row_custom['customer_address'];
	  $phone = $row_custom['customer_phone'];
      $errors = array();
       
    
    ?>
    
    <div class="container-fluid bg-primary text-center p-5">
        <div class="container bg-white shadow text-center " style="border-radius:15px;">
            <h2>ویرایش اطلاعات کاربری</h2>
            <p>اطلاعات مربوط به فرم کاربری را به دقت تکمیل وارسال نمایید</p>
            <div class="row">
            <div class="col-md-6">
                  <form action="my_account.php?edit_account" method="post"> 
                    <div class="mb-3 row">
                      <label for="c_name" class="col-sm-2 col-form-label">نام :</label>
                      <div class="col-sm-10">
                          <input name="c_name" type="text"  class="form-control" id="c_name" placeholder="لطفا نام راواردکنید" value="<?php echo  $name; ?>"/>
                      </div>
                    </div>
                      <!--   lastname-->
                    <div class="mb-3 row">
                      <label for="c_lastname" class="col-sm-2 col-form-label">نام خانوادگی :</label>
                      <div class="col-sm-10">
                          <input name="c_lastname" type="text"  class="form-control" id="c_lastname" placeholder="لطفا نام خانوادگی تان راواردکنید" value="<?php echo $lastname; ?>"/>
                      </div>
                    </div>
                    <!--   gender-->  
                    <div class="mb-3 row">
                      <label for="c_gender" class="col-sm-2 col-form-label">جنسیت :</label> 
                      <div class="col-sm-10">
                          <select name="c_gender" class="form-select" aria-label="">
                            
                            <option selected value="<?php echo $gender;?>">انتخاب جنسیت</option>
                            <option value="مرد" >مرد</option>
                            <option value="زن" >زن</option>
                          </select>
                            
                      </div>
                    </div>
                    <!--   file-->    
             
			
			
		 
			
                  
		<!--   gender--> 	
		  							
                <!--   state-->         
                <div class="mb-3 row">
                   <label for="c_state" class="col-sm-2 col-form-label">استان :</label>  
                   <div class="col-sm-10">
                       <select name="state" class="form-select" onChange="iranwebsv(this.value);">
                           <option><?php echo $province; ?></option>
                           <option value="0">لطفا استان را انتخاب نمایید</option>
							<option value="تهران">تهران</option>
							<option value="گیلان">گیلان</option>
							<option value="آذربایجان شرقی">آذربایجان شرقی</option>
							<option value="خوزستان">خوزستان</option>
							<option value="فارس">فارس</option>
							<option value="اصفهان">اصفهان</option>
							<option value="خراسان رضوی">خراسان رضوی</option>
							<option value="قزوین">قزوین</option>
							<option value="سمنان">سمنان</option>
							<option value="قم">قم</option>
							<option value="مرکزی">مرکزی</option>
							<option value="زنجان">زنجان</option>
							<option value="مازندران">مازندران</option>
							<option value="گلستان">گلستان</option>
							<option value="اردبیل">اردبیل</option>
							<option value="آذربایجان غربی">آذربایجان غربی</option>
							<option value="همدان">همدان</option>
							<option value="کردستان">کردستان</option>
							<option value="کرمانشاه">کرمانشاه</option>
							<option value="لرستان">لرستان</option>
							<option value="بوشهر">بوشهر</option>
							<option value="کرمان">کرمان</option>
							<option value="هرمزگان">هرمزگان</option>
							<option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
							<option value="یزد">یزد</option>
							<option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
							<option value="ایلام">ایلام</option>
							<option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
							<option value="خراسان شمالی">خراسان شمالی</option>
							<option value="خراسان جنوبی">خراسان جنوبی</option>
							<option value="البرز">البرز</option>
						</select>
                   </div>
                </div>
                    
                    
                <!--city-->
                <div class="mb-3 row">
                   <label for="city" class="col-sm-2 col-form-label">نام شهر :</label> 
                   <div class="col-sm-10">
                       <select name="city" class="form-select" id="city">
                       <option ><?php echo $city; ?></option>
			           <option value="0">لطفا استان را انتخاب نمایید</option>
		       </select>
                       
                   </div>
                </div>      
                      
                <!--address-->      
                <div class="mb-3 row">
                  <label for="c_address" class="col-sm-2 col-form-label">آدرس : </label>
                  <div class="col-sm-10">
                    <input name="c_address" type="text"  class="form-control" id="c_address" placeholder="لطفا آدرستان راواردکنید"value="<?php echo $address;?>"/>
                  </div>
                </div>     
                <!--phone-->      
                <div class="mb-3 row">
                  <label for="c_phone" class="col-sm-2 col-form-label">تلفن همراه</label>
                  <div class="col-sm-10">
                    <input name="c_phone" type="text"  class="form-control" id="c_phone" placeholder="لطفا شماره موبایتان راواردکنید" value="<?php echo $phone; ?>"/>
                  </div>
                </div>      
                <!--pass-->      

                <!--submit-->
                
                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <input class="btn btn-primary btn-lg" type="submit" name="update" value="بروزرسانی">
                    </div>
                    
                </div>
                
                
                
                
                </form>
            </div>
                
                <div class="col-md-6">
                    <img src="image/regist.jpg" style="width: 100%;height: auto;border-radius: 150px; "/> 
                </div>
        </div>
        
    </div>
    <?php 
    
$errors = array();
// REGISTER USER
if (isset($_POST['update'])) {
    $c_name = mysqli_real_escape_string($con, $_POST['c_name']);
    if (empty($c_name)) {
        array_push($errors, "نام اجباری است");        
    }
    //lastName;
    $c_lastname = mysqli_real_escape_string($con,$_POST['c_lastname']);
    if (empty($c_lastname)) {
        array_push($errors,"نام خانوادگی اجباری است");
        
    }
    $c_gender = mysqli_real_escape_string($con,$_POST['c_gender']);
    if (empty($c_gender)) {
        array_push($errors, "انتخاب جنسیت اجباری است");
        
    }

        
    //state
    $c_province = $_POST['state'];
    if (empty($c_province)) {
        array_push($errors, "استان راانتخاب کنید");
        
    }
    //city
    $c_city = $_POST['city'];
    if (empty($c_city)) {
        array_push($errors, "شهرراانتخاب کنید");
        
    }
    //address
    $c_address = mysqli_real_escape_string($con,$_POST['c_address']);
    if (empty($c_address)) {
        array_push($errors, "آدرس اجباری است");
        
    }
        
//phone
    $c_phone_validate = mysqli_real_escape_string($con,$_POST['c_phone']);
    if (empty($c_phone_validate)) {
        array_push($errors, "شماره تلفن نبایدخالی باشد");
        
    }else{
        if (preg_match(  "/^[0]{1}[9]{1}\d{9}$/",$c_phone_validate )) {
            $c_phone = $c_phone_validate;
        }
        else{
            array_push($errors, "شماره تلفن بدرستی وارد نشده");
        }
    }
   
       
        if (count($errors)==0) {
              
          $upload_c = "UPDATE customer SET customer_name='$c_name',customer_lastname='$c_lastname',customer_gender='$c_gender',customer_province='$c_province',customer_city='$c_city',customer_address='$c_address',customer_phone='$c_phone' WHERE customer_id=$id";
            $run_upload = mysqli_query($con,"SET NAMES SET utf8");
			$run_upload = mysqli_query($con,"SET CHARACTER SET utf8");
			$run_upload = mysqli_query($con,$upload_c);
        }
          if($run_upload)
			{
				echo "<script>alert('$c_name عزیز ، اطلاعات شما به درستی به روز رسانی شد !')</script>";
				echo "<script>window.open('my_account.php?edit_account','_self')</script>";
			}
			}else{
			include('../includes/errors.php');
}


    
    ?>
</body>
</html>