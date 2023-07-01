<html>
    <head>
        <style>
        @font-face{
        font-family:'nasim';
        src:url("font/Nasim.otf");
        }
        body{
            font-family:nasim;
        }
          myrow {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.mycolumn {
  float: right;
  width: 25%;
 margin-bottom:40px;
  padding: 4px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.myrow:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .mycolumn {
    width: 50%;
    margin-bottom:60px;
    
  }
}  
        </style>
    </head>
    <body>
        


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
          <h1 id="p" class="h2">محصولات</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <?php include_once 'shopping_cart.php'; ?>
        </div>
      </div>

      <div class="myrow">
         <?php getPro();
          getCatPro();
          getBrandPro();
         ?>
         
       
      </div>
    </main>
      <!-- Left_SideBar  - END-->
  </div>
</div>


    <?php include_once 'includes/Footer.php'; ?>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

        
