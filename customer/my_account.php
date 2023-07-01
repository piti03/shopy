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
        <script src="js/city.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
<body>
   <?php include_once'Header.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
              <?php  include_once 'Right_Sidebar.php';?>
            </div>
            <div class="col-sm-9">
                <div class="container text-center">
                <?php
                
                if (!isset($_GET['edit_account'])) {
                    echo " welcome to my account";
                  if (isset($_GET['change_pass'])) {
                    if (isset($_GET['delete_account'])) {
                       
                       
                       
            
                   }
        
               }
    
            }  
            
              
            
           
             if (isset($_GET['edit_account'])) {
                      include_once 'edit_account.php';
        
            }
    

                
                ?>
                
                
               </div> 
            </div>
            
        </div>
    </div>






</body>
</html>