<nav id="sidebarMenu" class="d-md-block bg-light sidebar collapse">
      <div class="container-fluid">
          
        <?php 
        
        include_once 'function.php';
        include_once 'db.php';
        ?>
       <ul class="nav flex-column text-center m-3">
        
         <?php 
         if(isset($_SESSION['customer_email']))
         
    
        $user = $_SESSION['customer_email'];
        
        $select_user = "SELECT * FROM customer WHERE customer_email='$user'";
        $run_user = mysqli_query($con, "SET NAMES utf8");
        $run_user = mysqli_query($con, "SET CHARACTER SET utf8");
        $run_user = mysqli_query($con, $select_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_image = $row_user['customer_image'];
        $user_email = $row_user['customer_email'];
        $user_name = $row_user['customer_name'];
        $user_lastname = $row_user['customer_lastname'];
       echo "<li class='nav-item'><img src='../$user_image' style='width:150px ; height:150px;'/></li>";
       echo "<li class='nav-item'><b>$user_name$user_lastname</b></li>";
       echo "<li class='nav-item'>$user_email</li>";
       
       
        ?>
         </ul>
        
        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"></h4>
        <hr>
        <ul class="nav flex-column m-5">
           
		
		<li><a href="my_account.php?edit_account">ویرایش اطلاعات</a></li>
	    <li><a href="my_account.php?change_pass">تغییر رمز عبور</a></li>
		<li><a href="my_account.php?delete_account">حذف اکانت من</a></li>
		<li><a href='../logout.php' >خارج شدن ار حساب کاربری</a></li>
						
            
        </ul>
      </div>
    </nav>
    

