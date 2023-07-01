<?php include_once 'includes/Header.php'; ?> 
    <!--  Header component - END-->
     
 <div class="container-fluid">
  <div class="row">
    <!-- Right_SideBar - START  -->
    <?php include_once 'includes/Right_Sidebar.php'; ?>
      
      <!-- Right_SideBar - END    -->
      <!-- Left_SideBar - START-->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 id="p" class="h2">محصولات</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
                <?php
         include_once 'shopping_cart.php'; 
            ?>
          
        </div>
      </div>

      <div class="row ">
     <?php
    global $con;
    if (isset($_GET['search'])) {
        $search_query = $_GET['user_query'];
         
        $get_pro = "select * from products where product_keywords like N'%$search_query%'";
        $run_pro = mysqli_query($con, "SET NAMES utf8");
        $run_pro = mysqli_query($con, "SET CHARACTER SET utf8");
        $run_pro = mysqli_query($con, $get_pro);
        while ($row_pro = mysqli_fetch_array($run_pro))
        {
            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_brand = $row_pro['product_brand'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_desc = $row_pro['product_desc'];
            $pro_image = $row_pro['product_image'];
            echo 
             "<div class='mycolumn'>"
                    . "<div class='card p-1'>"
                    ."<div class='container text-center'>"
                    . "<img width='100' height='100' src='admin_area/$pro_image' style='border-radius:50%;'/>"
                    . "</div>"
                    ."<br>"
                    . "<ul class='list-group list-group-flush'>"
                    . "<li class='list-group-item'><h5> $pro_title</h5></li>"
                    . "<li class='list-group-item' style='color:gray;'><p>قیمت :<span> $pro_price</span></p></li></ul>"
                        
                          . "<div class=row text-center>"
                            . "<div class=col-md-6>"
                              . "<a href='' class='btn btn-outline-danger' style='width:100%;'>خرید</a>"
                            . "</div>"
                            . "<div class=col-md-6>"
                              . "<a href='details.php?product_id=$pro_id' class='btn btn-outline-warning' style='width:100%;'>جزئیات</a>"
                            . "</div>"
                          . "</div>"
                    . "</div>"
             . "</div>";
        }
        
    }

  ?>       
       
      </div>
    </main>
      <!-- Left_SideBar - START - END-->
  </div>
</div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

        
</body>
</html>












