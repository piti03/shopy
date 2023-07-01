<!DOCTYPE>
<html dir="rtl">
<head>
    <title>title</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/4eb0ea4e39.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container text-center p-5">


<?php 
include_once 'functions/function.php';
include_once 'includes/db.php';
?>
<h2>بازیابی رمزعبور</h2>
<form method="post" action="">
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">ایمیل خودراواردکنید</label>
        <div class="col-sm-10">
            <input class="form-control" name="email" type="text" id="email" required/>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <input size="50" type="submit" name="submit" value="بازیابی"/>
        </div>
    </div>
        
</form>

<?php 
if (isset($_POST['email']) && ($_POST['email'] != "")){
    $email = trim($_POST['email']);
    $code = md5(uniqid(TRUE));#random alphernumeric character store in $code variable
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE) {
        $checkMail = "SELECT customer_email FROM customer WHERE customer_email='$email'";
        $runMail = mysqli_query($con, "SET NAMES utf8");
        $runMail = mysqli_query($con, "SET CHARACTER SET utf8");
        $runMail = mysqli_query($con, $checkMail);
        $count = mysqli_num_rows($runMail);
        if ($count == 1) {
            $inserted = mysqli_query($con,"UPDATE customer SET lost='$code'WHERE customer_email='$email'");
            $to = $email;
            $subject = "لینک بازیابی رمز عبور";
            $header = "hrrp@hrrabi.ir";
            $body = "با سلام لینک بازیابی رمزعبور برای شما   کافیست بروی لینک موردنظرکلیک کرده ومراحل راادامه دهید.باتشکر.https://hrrabi.ir/shop/updatepassword.php?email=$email&code=$code";
            $sent = mail($to, $subject, $body,$header);
            if ($inserted){
                echo "<script>alert('لینک بازیابی رمز عبوربرایتان ارسال شد')</script>";
            }
        }
        else{
            echo "<script>alert('متاسفم با ایمیل $email اکانتی موجودنیست میتوانید درصفحه مربوط به ثبت نام ادامه دهید')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
        
    }else{
        echo "<script>alert('این آدرس ایمیل معتبرنیست')</script>";
    }
}



?>
</div>
</body>
</html>
