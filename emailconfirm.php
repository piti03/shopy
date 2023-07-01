<html dir="rtl">
<meta charset="UTF-8">
        <title>ثبت نام</title>
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
    h2{
        font-family: nasim;
    }
</style>
<body>
<?php 
error_reporting(~E_WARNING||~E_NOTICE);
session_start();

include_once 'includes/Header.php'; ?>
<?php include_once 'functions/function.php'; ?>  
<?php include_once 'includes/db.php'; ?>
    <div class="container text-center p-5">
        <?php
        
        if (isset($_GET["customer_ip"])) {
            
            $ip = $_GET["customer_ip"];
            $code = $_GET["code"];
            $query = "SELECT * from customer WHERE customer_ip LIKE '%{$ip}%'";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
                $confirmcode = $row['confirm_code'];
                $name = $row['customer_name'];
                $lastname = $row['customer_lastname'];
                $email = $row['customer_email'];
                
            }
            if ($confirmcode == $code) {
                mysqli_query($con, "update customer set confirmed = '1'");
                mysqli_query($con, "update customer set confirm_code = '0'");
                echo "<script>alert('تبریک  ایمیل شما تایید وثبت نامتان تکمیل شد.')</script>";
                $sel_cart = "select * from cart where ip_add = '$ip'";
                $run_cart = mysqli_query($con, $sel_cart);
                $check_cart = mysqli_num_rows($run_cart);
                if ($check_cart == 0) {
                    $_SESSION['customer_name'] = $c_name;
                    $_SESSION['customer_lastname'] = $c_lastname;
                    $_SESSION['customer_email'] = $c_email;
                    echo "<script>window.open('customer/my_account.php','_self')</script>";
                    
                }else{
                    $_SESSION['customer_name'] = $c_name;
                    $_SESSION['customer_lastname'] = $c_lastname;
                    $_SESSION['customer_email'] = $c_email;
                    echo "<script>window.open('checkout.php','_self')</script>"; 
                }
                
            }else{
                echo "<script>alert('ایمیل با کد تایید مطابقت ندارد.')</script>";
		echo "<script>window.open('customer_register.php','_self')</script>";
            }
            
        }else{
            echo "<p>باید لینک ارسالی به ایمیلتان راتاییدنمایید</p>";
        }
        
        
        ?>
    </div>   
</body>





