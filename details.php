<?php include_once 'includes/Header.php';?> 
    <!--  Header component - END-->
     
 <div class="container-fluid">
  <div class="row">
    <!-- Right_SideBar - START  -->
    <?php include_once 'includes/Right_Sidebar.php'; ?>
      
      <!-- Right_SideBar - END    -->
      <!-- Left_SideBar - START-->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 id="p" class="h2">جزئیات محصول</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <?php include_once 'shopping_cart.php'; ?>
        </div>
      </div>
        
<?php 
        
if (isset($_GET['product_id']))
{
    global $con;
    $id_product = $_GET['product_id'];
    $get_pro = "SELECT * FROM products WHERE product_id = '$id_product'";
    $run_pro = mysqli_query($con,"SET NAMES utf8");
    $run_pro = mysqli_query($con, "SET CHARACTER SET utf8");
    $run_pro = mysqli_query($con, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro))
    {
        //id,title,price,desc,image
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image =  $row_pro['product_image'];
           echo "<div class='main'>"
                . "<h1>$pro_title</h1>"
                . " <hr>"
                . "<div class='content'>"
                   . "<img src='admin_area/$pro_image' alt='image' style='width:100%'>"
                   . "<h3>قیمت :<span>$pro_price</span><span>تومان</span></h3>"
                   . "<hr>"
                   . "<p>$pro_desc</p>"
                   . "<ul>"
                   . "<li><a href='index.php' class='btn-outline-success'>بازگشت</a></li>"
                   . "<li><a href='index.php?add_cart=$pro_id' class='btn-outline-success'>خرید</a></li>"
                   . "</ul>"
                   . "</div>"
                   . " </div>";
          
                    }
   
    
                }  
       else 
      {
    
      }
       
?>
        
        </div>
      
    </main>
      <!-- Left_SideBar  - END-->
  </div>
</div>


    <?php include_once 'includes/Footer.php'; ?>

