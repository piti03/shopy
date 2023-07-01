<!DOCTYP>
<html dir="rtl">
<head>
    <title>لاگین</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/4eb0ea4e39.js" crossorigin="anonymous"></script>
        <script src="js/city.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    @font-face{
        font-family: 'nasim';
        src: url("font/Nasim.otf");
    }
    body{
        font-family: nasim;
    }
    h1,h2{
        font-family: nasim;
    }
</style>
    
<body>
<?php 
session_start();
include_once 'functions/function.php'; ?>
    <div class="container text-center  p-5">
    <h1>کاربرگرامی لطفا ابتدا ثبت نام کرده</h1>
    <h2>وسپس خریدهای خودراتکمیل کنید</h2>
    
    
    <div class="row shadow" style="border-radius:28px;">
     <div class="col-sm-6">
            <form method="post" action="">
        <div class="container p-5">
          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">ایمیل :</label>
            <div class="col-sm-10">
                <input name="email" type="text"  class="form-control" id="email" placeholder="لطفا ایمیل خودراواردکنید" required/>
            </div>
          </div>
             <div class="mb-3 row">
            <label for="pass" class="col-sm-2 col-form-label">رمز عبور</label>
            <div class="col-sm-10">
                <input name="pass" type="password"  class="form-control" id="pass" placeholder="لطفا رمزعبورتان راواردکنید" required/>
            </div>
          </div>
            <div class="mb-3 row">
                <div class="col-sm-12 mb-3">
                    <a class="btn btn-danger btn-lg" href="checkout.php?forgot_pass">رمزعبورتان رافراموش کرده اید؟</a>
                </div>
                <div class="col-sm-12 mb-3">
                    <input class="btn btn-primary btn-lg " name="send_U_P" type="submit"   value="ورود به صفحه کاربری">
                </div>
                <div class="col-sm-12 mb-3">
                    <a class="btn btn-success btn-lg" href="customer_register.php">ثبت نام جدید</a>
                </div>
                
            </div>
            
            
            
            
            
        </div>
    </form>
   </div>
        <div class="col-sm-6">
            <img src="image/body.jpg" style="width: 100%; height: auto; border-radius:28px;"/>
        </div>
    </div>
    
    
    
</div>
 <?php 

        if(isset($_POST['send_U_P'])){
           $c_email_no_empty = mysqli_real_escape_string($con ,$_POST['email']);
            $c_password_1_validate = mysqli_real_escape_string($con,$_POST['pass']);
                $c_email_no_empty = mysqli_real_escape_string($con,$_POST['email']);
            $c_password_1_validate = mysqli_real_escape_string($con,$_POST['pass']);
            if (empty($c_email_no_empty) && empty($c_password_1_validate)){
                echo "<script>alert('ایمیل یا رمزعبورراواردنکرده اید')</script>";
            }else{
                $c_email_validate = $c_email_no_empty;
                if(filter_var($c_email_validate , FILTER_VALIDATE_EMAIL) == TRUE){
                    if (preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/", $c_password_1_validate)) {
                        $c_email = $c_email_validate;
                        $c_pass = $c_password_1_validate;
                    }
                }else{
                    echo "<script>alert('ایمیل یارمزعبورصحیح نیست')</script>";
                }
            }
           
        }
        if (isset($c_pass) and isset($c_email)) {
        $sel_c = "SELECT * FROM customer WHERE customer_pass='$c_pass' AND customer_email='$c_email'";
        $run_c = mysqli_query($con, "SET NAMES utf8");
        $run_c = mysqli_query($con, "SET CHARACTER SET utf8");
        $run_c = mysqli_query($con, $sel_c);
        $check = mysqli_num_rows($run_c);
        if ($check == 0) {
            echo "<script>اطلاعات اشتباه است</script>";
        }else{
            while ($run_customer_login = mysqli_fetch_array($run_c)){
               $_SESSION['customer_email'] = $run_customer_login['customer_email'];
                $customer_login_name = $run_customer_login['customer_name'];
                $customer_login_lastname = $run_customer_login['customer_lastname'];
                $customer_confirmed = $run_customer_login['confirmed'];
            }
            if($customer_confirmed == 1){
                //creating or using cookie
                if (isset($_COOKIE['ipUserEcommerce'])) {
                    $ip = $_COOKIE['ipUserEcommerce'];
                    
                }else{
                    $ip = getIp();
                    setcookie('ipUserEcommerce',$ip,  time() + 1206900);
                }
                $sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";
                $run_cart = mysqli_query($con, $sel_cart);
                $chck_cart = mysqli_num_rows($run_cart);
                $_SESSION['customer_name'] = $customer_login_name;
                $_SESSION['customer_lastname'] = $customer_login_lastname;
                if ($chck_cart == 0) {
                   $_SESSION['customer_email'] = $c_email;
                    echo "<script>alert('$customer_login_name $customer_login_lastname خوش آمدید انتقال به صفحه کاربری')</script>";
                    echo "<script>window.open('customer/my_account.php','_self')</script>";
                }else{
                    $_SESSION['customer_email'] = $c_email;
                    echo "<script>alert('$customer_login_name $customer_login_lastname  خوش آمدید انتقال به درگاه پرداخت')</script>";
                    echo "<script>window.open('checkout.php','_self')</script>";
                }
                    
                
            }else{
                echo "<script>alert('$customer_login_name $customer_login_lastname  شما هنوز ایمیلتان راتایید نکرده اید')</script>";
            }
        }
    }
    
  ?>  
 
</body>
</html>



