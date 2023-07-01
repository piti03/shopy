<?php
include('db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fa"  dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
<script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>

<script src="tinymce/tinymce.min.js"></script>
<script>
		tinymce.init({ 
		selector:'textarea' 
		});
</script>
<head>
<body>
   <div class="container-fluid shadow">
      <form  action=""  method="post" enctype="multipart/form-data">
        <div class="container text-center  p-3 m-3">
            <h2>اطلاعات مربوط به محصول را در این جدول اضافه کنید</h2>
            <h4>ویژگی های محصول</h4>
        </div>
           <div class="container" style="overflow-x: auto;">
                  <table class="table">
         
         
		<tr>
                    <td><b>نام محصول</b></td>
                    <td class="table-primary"><input class="form-control" type="text" name="product_title" size="70" required></td >
		</tr>		
              
		<tr>
			<td><b>دسته بندی  محصول</b></td>
                        <td class="table-secondary">
                            <select name="product_cat" required>
				<option>انتخاب دسته بندی</option>
				<?php
					$get_cat="select * from categories";
					$run_cat=@mysqli_query($con,"SET NAME utf8");
					$run_cat=@mysqli_query($con,"SET CHARACTER SET utf8");
					$run_cat=mysqli_query($con,$get_cat);
					while($row_cat=mysqli_fetch_array($run_cat))
					{
						$cat_id=$row_cat['cat_id'];
						$cat_title=$row_cat['cat_title'];
						echo"<option value='$cat_id'>$cat_title</option>";
					}
				?>
			</select>
									
			</td >
		</tr>
		
		<tr>
			<td><b>برند محصول</b></td >
                        <td class="table-secondary">
			<select name="product_brand" required>
                            <option style="color:grey;">انتخاب برند</option>
				<?php
					$get_brand="select * from brands";
					$run_brand = @mysqli_query($con,"SET NAMES utf8");
					$run_brand = @mysqli_query($con,"SET CHARACTER SET utf8");
					$run_brand=mysqli_query($con,$get_brand);
					while($row_brand=mysqli_fetch_array($run_brand))
					{
						$brand_id=$row_brand['brand_id'];
						$brand_title=$row_brand['brand_title'];
						echo"<option value='$brand_id'>$brand_title</option>";
					}
				?>
			</select>
			</td>
		</tr>

		
		<tr>
			<td><b>قیمت محصول</b></td >
                        <td class="table-danger"><input type="text" name="product_price" required></td>
		</tr>

		
		<tr>
			<td><b>توصیف محصول </b></td>
                        <td class="table-warning"><textarea name="product_desc" ></textarea></td>
		</tr>

		
		<tr>
			<td><b>عکس محصول</b></td >
                        <td class="table-danger"><input type="file" name="product_image" required></td >
		</tr>
		
		<tr>
			<td><b>کلمات کلیدی</b> </td >
                        <td class="table-success"><input type="text" name="product_keywords" size="70" required></td >
		</tr>
		
		
              <tr class="table-warning">
                    <td  align="center"><input type="submit" name="submit" value="بارگذاری"> </td>
                    <td  align="center"><input type="reset" name="reset" value="ریست کردن"></td>
		</tr>
	</table>
       </div>
     
</form>
</div>
<?php
// define variables and set to empty values

if(isset($_POST['submit']))
	{
    		
			$product_title = $_POST["product_title"];
			$product_cat = $_POST["product_cat"];
			$product_brand = $_POST["product_brand"];
			$product_price = $_POST["product_price"];
			$product_desc = $_POST["product_desc"];
			$product_keywords = $_POST["product_keywords"];
			
					
		//getting the image form the image fields
		$product_image_name	=$_FILES['product_image']['name'];
		$product_image_tmp	=$_FILES['product_image']['tmp_name'];
		$address_images='product_images/'.$product_image_name;
		move_uploaded_file($product_image_tmp,$address_images);
			
			$insert_product = "INSERT INTO products (product_title ,product_cat , product_brand , product_price , product_desc , product_image , product_keywords)
			VALUES (N'$product_title' , $product_cat , $product_brand , $product_price , N'$product_desc' , N'$address_images' , N'$product_keywords' )";
            $insert_pro=mysqli_query($con,$insert_product);

		//display message to user		
		if($insert_pro)
		{
			echo"<script>alert('تبریک...داده های مربوط به محصول شما به درستی وارد شد.')</script>";
			echo"<script>window.open('insert_product.php','_self')</script>";
		}
			
    
	}
?>

</body>
</html>

