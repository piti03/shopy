<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/4eb0ea4e39.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>    
    </head>
    <style>
    @font-face{
        font-family: 'nasim';
        src: url("font/Nasim.otf");
    }
    body{
        font-family: nasim;
    }
        .Dparent{
             width: 100%;
            text-align: center; 
        }
        .Dchild{
          width: 100%;
          margin-left: auto;
          margin-right: auto;
          overflow-x:auto;
        }
        .caption{
            background-color: #5e35b1;
            padding: 20px;
            border-top-right-radius: 16px;
            border-top-left-radius: 16px;
            
        }
        .caption h1{
            color:white;
        }
        table{
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 10px solid #c5cae9;
  text-align: center;
}
tr{
    text-align: center;
    border: 3px double yellow;
    border-left: 2px solid #333;
}
th, td{
    text-align: center;
    padding: 16px;
}
th:first-child,td:first-child{
    text-align: center;
}
td:nth-child(even){
    background-color: #f2f2f2;
    text-align: center;
}
@media screen and(max-width : 600px){
    .pay{
        width: 100%;
    }
}
.resulted{
    margin-top: 20px;
    padding:0;
}
.resulted input{
    background-color: #1976d2;
    padding: 12px;
    border-radius: 8px;
    color: white;
}
.resulted button{
    background-color: #ad1457;
    color:white;
    padding: 12px;
    border-radius: 8px;
}

.resulted p{
     background-color: #d500f9;
    color:white;
    padding: 8px;
    border-radius: 4px;
    
}
    </style>
    <body>
        
  
<?php
error_reporting(~E_WARNING||~E_NOTICE); 
session_start();
include_once 'functions/function.php';
//operator button chekout ,continue , update_cart
if(isset($_COOKIE["ipUserEcommerce"])){
	$ip=$_COOKIE["ipUserEcommerce"];
	}else{
	$ip=getIp();
	setcookie('ipUserEcommerce',$ip,time()+1206900);
	}
	if(isset($_POST['update_cart']))
	{
	  if(isset($_POST['remove']))
	   {
		foreach($_POST['remove'] as $remove_id){
		$delete_product = "delete from cart where ip_add='$ip' AND p_id='$remove_id'";
		$run_delet =@mysqli_query($con,$delete_product);
		if ($run_delet){
		echo "<script>window.open('cart.php','_self')</script>";							
	
				}
			}
		}
	}
	if(isset($_POST['continue']))
	{
	echo "<script>window.open('index.php','_self')</script>";
	}else{
	    if(isset($_POST['checkout'])){
	       
	        if (isset($_COOKIE['ipUserEcommerce'])) {
                $ip = $_COOKIE['ipUserEcommerce'];
            }else{
                $ip = getIp();
                setcookie('ipUserEcommerce',$ip,time()+1206900);
            }
            
            $total_price = $_SESSION['price_total_purchase'];
            $query_search = "SELECT * FROM total WHERE ip LIKE '%{$ip}%'";
            $result_search = mysqli_query($con, $query_search);
            while ($row = mysqli_fetch_array($result_search)){
                $ip_search = $row['ip'];
            }
                if($ip == $ip_search){
                    mysqli_query($con, "update total set price_total_purchase='$total_price'");
                }else{
                    $query = "INSERT INTO total(ip,price_total_purchase)VALUES('$ip','$total_price')";
                    $run_c = mysqli_query($con, $query);
                }
                echo "<script>window.open('checkout.php','_self')</script>";
	    }
	}	
     ?>
 

<form action="cart.php" method="post" enctype="multipart/form-data">
    <div class="Dparent">
        <div class="caption">
            <i style="font-size:128px;color:white;" class="fa-solid fa-bag-shopping"></i>
           <hr style="width:40%"><hr style="width:30%">
           <h1>محصولاتی که خریداری کرده اید</h1>
        </div>
        
        <div class="Dchild">
   
	
    <table>
   
		<tr >
			<th>محصول</th>
                        <th></th>
			<th>تعداد</th>			
			<th>قیمت</th>			
			<th>حذف</th>
		</tr>
                
                
                <?php 
                
                
                $total = 0;
                global $con;
                if (isset($_COOKIE['ipUserEcommerce'])){
                    $ip = $_COOKIE['ipUserEcommerce'];
                }else{
                    $ip = getIp();
                    setcookie('ipUserEcommerce',$ip,  time()+1206900);
                }
                    $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
                    $run_price = mysqli_query($con, "SET NAMES utf8");
                    $run_price = mysqli_query($con, "SET CHARACTER SET utf8");
                    $run_price = mysqli_query($con, $sel_price);
                    while ($p_price = mysqli_fetch_array($run_price))
                    {
                        $pro_qty = $p_price['qty'];
                        $pro_id = $p_price['p_id'];
                        $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
                        $run_pro_price = mysqli_query($con, $pro_price);
                        while ($pp_price = mysqli_fetch_array($run_pro_price))
                        {
                            //$product_price = array($pp_price['product_price']);
                            $product_id = $pp_price['product_id']; 
                            $product_title = $pp_price['product_title'];
                            $product_image = $pp_price['product_image'];
                            $single_price = $pp_price['product_price'];
                            //$value = array_sum($product_price);
                            //$total += $value;
                            ?>
                <tr align="center" style="border: 1px solid black;">
                    <td style="padding: 15px;">
                        <?php echo $product_title; ?>
                    </td>
                    <td>
                        <img src="admin_area/<?php echo $product_image;?>" width="60" height="45"/>
                    </td>
                    <td>
                        <?php 
            if (isset($_POST['update_cart'])) {
                $str_ip = str_replace(".","","$ip");
                $qty = $_POST["$str_ip$product_id"];
                $update_qty = "update cart set qty='$qty' where p_id='$product_id'";
                $run_qty = mysqli_query($con, $update_qty);
                $_SESSION["$str_ip"]["$product_id"]=$qty;
    
               }
               $str_ip = str_replace(".","","$ip");
               if(isset($_SESSION["$str_ip"][$product_id])){
                   echo "<input type='text' size='4' name='$str_ip$product_id' value='".$_SESSION["$str_ip"]["$product_id"]."'/>";
                   $quantity = $_SESSION["$str_ip"]["$product_id"];
                   $total +=($single_price*$quantity);
               }  else {
                   echo "<input type='text' size='4' name='$str_ip$product_id' value='$pro_qty'>";
                   $total +=($single_price*$quantity);
               }
                        
                ?>
                       
                    </td>
                    <td>
                        <?php echo $single_price; ?>
                    </td>
                    <td>
                        <input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/>
                        
                    </td>
                        
                </tr>
                <?php
                        }
                    }
                    
               
               ?> 
                
        
	  
	  
       
      </table>
          
  </div>
    <div class="resulted">
            <input type="submit" name="continue" value="ادامه خرید"/>
            
	        <button name="checkout">تسویه حساب</button>
	        
            <input type="submit" name="update_cart" value="بروز رسانی قیمت"/>
            
            <p>
	     	<b class="res">جمع کل:</b>
		    <b><?php echo $total." تومان ";
		    $_SESSION['price_total_purchase']= $total; ?></b>
		    </p>
          </div>
</div>
</form>


  </body>
</html>









