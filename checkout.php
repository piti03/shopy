<?php include_once 'includes/Header.php';?>
  
<div class="container-fluid">
  <?php 
  session_start();
    if (isset($_GET['forgot_pass'])) {
    include_once 'forgot_password.php';
    }else{
    if (isset($_SESSION['customer_email'])) {
        include_once 'payment.php';
    }else{
        include_once 'customer_login.php';
    }
}        
  ?>
</div>