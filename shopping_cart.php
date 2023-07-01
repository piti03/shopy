<div id="sidebar"> 
	
	
	
                   
		
			<span><a style="text-decoration:none" href="cart.php" >تایید خرید !</a></span>
		</div>
      <?php
            error_reporting(~E_WARNING);
            if (isset($_GET['add_cart'])) {
                echo "محصول موردنظربه سبدشما اضافه شد"."<br>";
                echo "<br>";
                cart();
                echo "<span>تعداد محصولات خریداری شده شما تاکنون</span>";
                total_items();
                
            }
            if(!isset($_SESSION['customer_email']))
		{
			echo "<br><span><a  href='checkout.php'  style='background: green;color:#fff;text-decoration: none;'>وارد شدن به حساب کاربری</a></span>";
		}
		else
		{
                    $name_customer = $_SESSION['customer_name'];
                    $lastname_customer = $_SESSION['customer_lastname'];
			echo "<span><a href='logout.php' style='background:red;color:#fff;text-decoration: none;' >خارج شدن از حساب کاربری</a></span>";
		}
            ?>