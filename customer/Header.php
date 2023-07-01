<!DOCTYPE html>

<html dir="rtl">
    <head>
        <meta charset="UTF-8">
        <title>فروشگاه</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/city.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <style>
         @font-face{
             font-family : 'nasim';
             src : url("../font/Nasim.otf");
            
         }
         body{
             font-family : nasim;
         }
        </style>
</head>
<body>
    <?php 
      error_reporting(~E_WARNING||~E_NOTICE);
      session_start();
      
  
   
     
    include_once 'functions/function.php'; ?>
    <!--  Header component - START-->
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color:#ad1457;">
    <div class="container-fluid">
        <a id="m" class="navbar-brand" href="#">فروشگاه</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a id="n" class="nav-link active" aria-current="page" href="../index.php">خانه</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../all_products.php">همه محصولات</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="../cart.php">سبد خرید</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">درباره ما</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin_area/insert_product.php">ثبت محصول</a>
            </li>
          
       
            
        </ul>
     
    </div>
  </div>
</nav> 

