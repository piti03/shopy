<?php
error_reporting(~E_WARNING||~E_NOTICE);
include_once 'db.php';
// initializing variables
$c_name = "";
$c_lastname = "";
$c_gender = "";
$c_email = "";
$c_address = "";
$c_phone = "";
$c_password_1 = "";

$errors = array();
// REGISTER USER
if (isset($_POST['register'])) {
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
    // image...
    
  if(isset($_COOKIE["CustomerImage"])){
    if(isset($_COOKIE["CustomerImageTmp"])){
	$c_image = $_COOKIE["CustomerImage"];
	$c_image_tmp = $_COOKIE["CustomerImageTmp"];
	$new_address_image ="customer/customer_images/".$c_image;
	echo $new_address_image;
	}
	}else{
	if (empty($_FILES["c_image"]["name"])) 
	{ 
	array_push($errors, "تصویر خود را انتخاب کنید!"); 
	}else{
	
	$Allowextension = array("jpeg" , "jpg" , "png");
	$FileExtension=explode(".",$_FILES["c_image"]["name"]);
	$extension=end($FileExtension);
	if(in_array($extension,$Allowextension )&&($_FILES["c_image"]["size"]<=20971520))
	{
	if($_FILES["c_image"]["error"]==0)
	{
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	setcookie('CustomerImage',$c_image,time()+600);
	setcookie('CustomerImageTmp',$c_image_tmp,time()+600);
						
	$new_address_image ="customer/customer_images/".$c_image;
	move_uploaded_file($c_image_tmp,$new_address_image);
						
	}else{
	array_push($errors, "فایل به درستی آپلود نشد!!!");	
	}
	}else{
	array_push($errors, "تصویر مناسب را انتخاب کنید! پسوند مجاز برای تصویر شامل jpeg و jpg و png می باشد و حجم آن نباید بیشتر از 2 مگابایت باشد!!!");
		}
	   }
      }
        
     // email...
    $c_email_no_empty = mysqli_real_escape_string($con , $_POST['c_email']);
    if (empty($c_email_no_empty)) {
        array_push($errors, "ایمیل اجباری است");
        
    }else{
        $c_email_validate = $c_email_no_empty;
        if (filter_var($c_email_validate,FILTER_VALIDATE_EMAIL)==TRUE) {
            $c_exist_email = $c_email_validate;
            $query_exist_email = "select * from customer where customer_email = '$c_exist_email'";
            $run_exist_email = mysqli_query($con, $query_exist_email);
            $check_email = mysqli_num_rows($run_exist_email);
            if ($check_email ==0) {
            $c_email = $c_exist_email;
            }else{
                array_push($errors, "با این ایمیل قبلا ثبت نام انجام شده است؛ لطفا ایمیل جدیدی وارد نمایید!!!");
            }
                
            
        }else{
            array_push($errors,"ایمیل بدرستی وارد نشده است" );
        }
    }
   
    //state
    $province = $_POST['state'];
    if (empty($province)) {
        array_push($errors, "استان راانتخاب کنید");
        
    }
    //city
    $city = $_POST['city'];
    if (empty($city)) {
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
    //password
    $c_password_1_validate=mysqli_real_escape_string($con ,$_POST['c_password_1']);
		if (empty($c_password_1_validate)){ 
			array_push($errors, "پسورد خود را وارد نکرده اید!"); 
			}
			if(!preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/", $c_password_1_validate)){
			array_push($errors, "پسوردی که وارد کرده اید، طبق الگو نیست. دوباره پسورد را ");
                        } 
			$c_password_1 = $c_password_1_validate;
		
				
		
		
		$c_password_2 =mysqli_real_escape_string($con ,$_POST['c_password_2']);
		if (empty($c_password_2)){array_push($errors, "پسورد دوم را وارد نکرده اید!!!");}
		
		if((!empty($c_password_1_validate))&&(!empty($c_password_2)))
		{
			
			if ($c_password_1 !== $c_password_2)
			{
				array_push($errors, "پسورد های وارد شده یکسان نیستند!");
			}
		}
          if (isset($_COOKIE['ipUserEcommerce'])) {
              $ip = $_COOKIE['ipUserEcommerce'];
              
          }else{
              $ip = getIp();
              setcookie('ipUserEcommerce',$ip,time()+ 1206900);
          }
          if (count($errors)==0) {
              	//confirm email
              $confirmcode = rand();
              $query = "INSERT INTO customer"
                      . "(customer_ip,customer_name,customer_lastname,customer_gender,customer_image,customer_email,customer_province,customer_city,customer_address,customer_phone,customer_pass,confirmed,confirm_code)"
                      . "VALUES"
                      . "('$ip',N'$c_name',N'$c_lastname',N'$c_gender',N'$new_address_image',N'$c_email',N'$province',N'$city',N'$c_address',N'$c_phone',N'$c_password_1','0','$confirmcode')";
              $run_c = mysqli_query($con, $query);
              if ($run_c) {
                  $message = "باسلام لطفا جهت تکمیل ثبت نام خودبروی لینک زیر کلیک کنید"
                          . "https://hrrabi.ir/shop/emailconfirm.php?customer_name=$c_name&customer_ip=$ip&code=$confirmcode";
                  mail($c_email,"ازطرف سایت فروشگاه",$message,"hrrp@hrrabi.ir");
                  echo"<div class='loaders'></div>";
                  echo "<script>alert('باتشکرازثبت نامتان لینک فعالسازی برایتان ارسال شد')</script>";
                  echo "<script>window.open('emailconfirm.php','_self')</script>";
                  
              }
          }
}



