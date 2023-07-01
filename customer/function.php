<?php

$con =mysqli_connect("localhost","hrrabiir_ecommerce","hamidreza1363","hrrabiir_ecommerce");



if (mysqli_connect_errno()) {
    echo "ارتباط با پایگاه داده برقرار نیست".  mysqli_connect_errno();
    
}


function  getCat(){
    global $con;
    $get_cat = "select * from categories";
    $run_cat = mysqli_query($con, "SET NAMES utf8");
    $run_cat = mysqli_query($con, "SET CHARACTER SET utf8");
    $run_cat = mysqli_query($con, $get_cat);
    while ($row_cat = mysqli_fetch_array($run_cat))
    {
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
        echo "<li class='nav-item'><a class='nav-link' href='index.php?cat_id=$cat_id'>$cat_title</a></li>";
    }
}
function getBrand(){
    global $con;
    $get_brand = "select * from brands";
    $run_brand = mysqli_query($con, "SET NAMES utf8");
    $run_brand = mysqli_query($con, "SET CHARACTER SET utf8");
    $run_brand = mysqli_query($con, $get_brand);
    while ($row_brand = mysqli_fetch_array($run_brand))
    {
        $brand_id = $row_brand['brand_id'];
        $brand_title = $row_brand['brand_title'];
        echo "<li class='nav-item'><a class='nav-link' href='index.php?barnd_id=$brand_id'>$brand_title</a></li>";
    }
}
function getPro(){
    global $con;
    if (( !isset($_GET['cat_id']))&&(!isset($_GET['brand_id']))) {
        $get_pro = "select * from products order by RAND() LIMIT 0,12";
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
                    . "<div class='card bg-white p-1'>"
                    ."<div class='container text-center'>"
                    . "<img width='100' height='100' src='admin_area/$pro_image'style='border-radius:50%;margin-top:16px;'/>"
                    . "</div>"
                    
                   ."<h5 style='margin-top:24px;margin-right:8px;'> $pro_title</h5>"
                  
                   ."<p style='margin-top:12px;margin-right:8px;'>قیمت :<span> $pro_price</span></p>"
                        
                          . "<div class=row text-center>"
                            . "<div class=col-md-6>"
                              . "<a href='index.php?add_cart=$pro_id' class='btn btn-outline-danger' style='width:100%;'>خرید</a>"
                            . "</div>"
                            . "<div class=col-md-6>"
                            . "<a href='details.php?product_id=$pro_id' class='btn btn-outline-warning' style='width:100%;'>جزئیات</a>"
                            . "</div>"
                          . "</div>"
                    . "</div>"
             . "</div>";
        }
        
    }
}
function getCatPro(){
    if (isset($_GET['cat_id'])) {
        global $con;
        $pro_cat_id = $_GET['cat_id'];
        //query getting products of cat
        $get_pro = "SELECT * FROM products WHERE product_cat = '$pro_cat_id'";
        //query getting name of category
        $get_cat_name = "SELECT cat_title FROM categories WHERE cat_id='$pro_cat_id'";
        $run_pro = mysqli_query($con,"SET NAMES utf8");
        $run_pro = mysqli_query($con, "SET CHARACTER SET utf8");
        $run_pro = mysqli_query($con,$get_pro);
        $run_cat_name = mysqli_query($con, $get_cat_name);
        //display name of category
        while ($row_cat_name = mysqli_fetch_array($run_cat_name)) {
            $pro_cat_name = $row_cat_name['cat_title'];
            echo "<h2>$pro_cat_name</h2>";
        }
        //display message when empty of category
        $count_pro_cat = mysqli_num_rows($run_pro);
        if ($count_pro_cat == 0) {
            echo "<b><h3>متاسفانه دسته خاصی دراین حوزه وجودندارد</h3></b>";
            
        }
     //display products of category
     while ($row_pro = mysqli_fetch_array($run_pro)){
            $pro_id=$row_pro['product_id'];
	    $pro_cat=$row_pro['product_cat'];
	    $pro_brand=$row_pro['product_brand'];
	    $pro_title=$row_pro['product_title'];
	    $pro_price=$row_pro['product_price'];
	    $pro_desc=$row_pro['product_desc'];
	    $pro_image=$row_pro['product_image'];
            echo 
             "<div class='mycolumn'>"
                    . "<div class='card bg-white p-1' style='width:200px;heiht:auto;'>"
                    ."<div class='container text-center'>"
                    . "<img width='100' height='100' src='admin_area/$pro_image'style='border-radius:50%;margin-top:16px;'/>"
                    . "</div>"
                    
                   ."<h5 style='margin-top:24px;margin-right:8px;'> $pro_title</h5>"
                  
                   ."<p style='margin-top:12px;margin-right:8px;'>قیمت :<span> $pro_price</span></p>"
                        
                          . "<div class=row text-center>"
                            . "<div class=col-md-6>"
                              . "<a href='index.php?add_cart=$pro_id' class='btn btn-outline-danger' style='width:100%;'>خرید</a>"
                            . "</div>"
                            . "<div class=col-md-6>"
                            . "<a href='details.php?product_id=$pro_id' class='btn btn-outline-warning' style='width:100%;'>جزئیات</a>"
                            . "</div>"
                          . "</div>"
                    . "</div>"
             . "</div>";
				
     }
    }
}
function getBrandPro(){
global $con;
if(isset($_GET['brand_id'])){
	$pro_brand_id=$_GET['brand_id'];
	//query getting products of brand
	$get_pro="select * from products where 	product_brand='$pro_brand_id' ";
	//query getting name of brand
	$get_brand_name="select brand_title from brands where brand_id='$pro_brand_id' ";
		
	$run_pro=@mysqli_query($con,"SET NAMES utf8");
	$run_pro=@mysqli_query($con,"SET CHARACTER SET utf8");
	$run_pro=mysqli_query($con,$get_pro);
	$run_brand_name=mysqli_query($con,$get_brand_name);
			
	//display name of brand
	while($row_brand_name=mysqli_fetch_array($run_brand_name))
	{
	$pro_brand_name=$row_brand_name['brand_title'];
	echo"<h2>$pro_brand_name</h2>";
	}
			
	//display message when empty of brand
	$cunt_pro_brand=mysqli_num_rows($run_pro);
	if($cunt_pro_brand==0)
	{
	echo"<br/><br/><b><h3>متاسفانه محصول خاصی در این برند وجود ندارد .</h3></b>";			
	}
							
	//display products of brand
	while($row_pro=mysqli_fetch_array($run_pro))
	{
				
	$pro_id=$row_pro['product_id'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];
	$pro_title=$row_pro['product_title'];
	$pro_price=$row_pro['product_price'];
	$pro_desc=$row_pro['product_desc'];
	$pro_image=$row_pro['product_image'];
	echo 
            "<div class='mycolumn'>"
                    . "<div class='card bg-white p-1' style='width:200px;heiht:auto;'>"
                    ."<div class='container text-center'>"
                    . "<img width='100' height='100' src='admin_area/$pro_image'style='border-radius:50%;margin-top:16px;'/>"
                    . "</div>"
                    
                   ."<h5 style='margin-top:24px;margin-right:8px;'> $pro_title</h5>"
                  
                   ."<p style='margin-top:12px;margin-right:8px;'>قیمت :<span> $pro_price</span></p>"
                        
                          . "<div class=row text-center>"
                            . "<div class=col-md-6>"
                              . "<a href='index.php?add_cart=$pro_id' class='btn btn-outline-danger' style='width:100%;'>خرید</a>"
                            . "</div>"
                            . "<div class=col-md-6>"
                            . "<a href='details.php?product_id=$pro_id' class='btn btn-outline-warning' style='width:100%;'>جزئیات</a>"
                            . "</div>"
                          . "</div>"
                    . "</div>"
             . "</div>";
	
			}
		}
	}

function  getIp()
{
    //whether ip is from remote address
    $ip = $_SERVER['REMOTE_ADDR'];
    //whether ip is from share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP']; }
    //whether ip is from proxy
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
    return $ip; 
}
//creating the shopping cart
//import attribute product and IP address user with press buy button in cart table
function cart(){
    global $con;
    if(isset($_GET['add_cart']))
    {
        $pro_id = $_GET['add_cart'];
        //creating or using cookie 
        if (isset($_COOKIE['ipUserREcommerce'])) {
            $ip = $_COOKIE['ipUserREcommerce'];
        }else{
            $ip = getIp();
            setcookie('ipUserREcommerce',$ip,  time()+1206900);
        }
        $check_pro = "SELECT * FROM cart WHERE p_id='$pro_id' AND ip_add='$ip'";
        $run_check = mysqli_query($con, $check_pro);
        if (mysqli_num_rows($run_check) > 0){
            echo "";
        }else{
            $insert_pro = "INSERT INTO cart (p_id,ip_add,qty)VALUES('$pro_id','$ip','1')";
            $run_insert_pro = mysqli_query($con, $insert_pro);
        }
            
    }
}
    
function total_items(){
    if (isset($_GET['add_cart']))
    {
    global $con;
    if (isset($_COOKIE['ipUserEcommerce'])){
        $ip = $_COOKIE['ipUserEcommerce'];
    }else{
        $ip = getIp();
        setcookie('ipUserEcommerce', $ip, time()+1206900);
    } 
    
    $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
        
    }else{
        global $con;
        if (isset($_COOKIE['ipUserEcommerce'])) {
            $ip = $_COOKIE['ipUserEcommerce'];
        }else{
            $ip = getIp();
            setcookie('ipUserEcommerce',$ip,  time()+1206900);
        }
        $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}       
 
function total_price(){
    $total = 0;
    global $con;
    if (isset($_COOKIE['ipUserEcommerce'])) {
        $ip = $_COOKIE['ipUserEcommerce'];
        
    }else{
        $ip = getIp();
        setcookie('ipUserEcommerce', $ip,time() + 1206900);
    }
    $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
    $run_price = mysqli_query($con, $sel_price);
    while ($p_price = mysqli_fetch_array($run_price))
    {
        $pro_id = $p_price['p_id'];
        $pro_qty = $p_price['qty'];
        $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id' ";
        $run_pro_price = mysqli_query($con, $pro_price);
        while ($pp_price = mysqli_fetch_array($run_pro_price))
        {
            $product_price = array($pp_price['product_price']* $pro_qty);
            $values = array_sum($product_price);
            $total += $values;
        }
    }
    echo $total."تومان";
}