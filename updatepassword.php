<!DOCTYPE>
<html>
<head>
    <title>rePassword</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/4eb0ea4e39.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
    include_once 'functions/function.php';
    include_once 'includes/db.php';?>
    <div class="container-fluid text-center p-5">
        <?php
if (isset($_GET['email']) && $_GET['code'] != "") {
    $email = $_GET['email'];
    $code = $_GET['code'];
    $checkMail_query = "SELECT customer_email FROM customer WHERE customer_email='$email' AND lost='$code' AND lost !=''";
    $checkMail = mysqli_query($con, "SET NAMES utf8");
    $checkMail = mysqli_query($con, "SET CHARACTER SET utf8");
    $checkMail = mysqli_query($con, $checkMail_query);
    $count = mysqli_num_rows($checkMail);
    if ($count) {
        if (isset($_POST['password'])) {
            $c_password_validate = mysqli_real_escape_string($con, $_POST['password']);
            if (empty($c_password_validate)) {
                echo "<script>alert('رمزعبورواردنشده است')</script>";
            }else{
                if (preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/", $c_password_validate)) {
                    $password = $c_password_validate;
                    $rePassword = $_POST['repassword'];
                    if ($password === $rePassword) {
                        $inserted=mysqli_query($con,"UPDATE customer SET lost='', customer_pass='$password' WHERE customer_email='$email'");
                        if ($inserted) {
                            echo "<script>alert('رمز عبورتغییرکرد')</script>";
                            echo "<script>window.open('checkout.php','_self')</script>";
                            
                        }
									
                        
                    }else{
                        echo "<script>alert('پسوردهایکسان نیستند')</script>";
                    }
                    
                }else{
                    echo "<script>alert('الگورعایت نشده است')</script>";
                }
            }
        }
        ?>    
            
        
            <h2>پسوردتان را ایجادکنید</h2>
            <h3>پسوردها باید شامل حداقل 6 وحداکثر12 کاراکترباشد. پسوردبایدترکیبی ازاعدادوحروف انگلیسی باشد.</h3>
            
            
            <div class="container shadow">
            <form method="post" action="">
                <div class="container-fluid">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="password">رمز عبور</label>
                    <div class="col-sm-10">
                    <input class="form-control" name="password" type="text" id="password" required/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="repassword">تکراررمزعبور</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="repassword" type="text" id="repassword" required/>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 text-center text-white">
                            <input class="btn bg-primary btn-lg" type="submit" value="change the password"/> 
                        </div> 
                    </div>
                </div>
              </div>
            </form>
        </div>
        
        
   <?php 
    }else{
        echo "<script>alert('خطایی رخ داده است')</script>";
    }
    
}
        
        
        ?>
        
        
        
    </div>
    
    
  
</body>
</html>

	