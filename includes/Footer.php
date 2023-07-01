<!--

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
-->
<style>
    body{
        font-family:sans-serif,Arial,Tahoma;
    }
.Bnavbar {
  overflow: hidden;
  background-color: #d1c4e9; 
  border-radius: 12px;
  position: fixed;
  bottom: 0;
  width: 100%;
  display: none;
  transition: ease-in-out 2s;
}

.Bnavbar a {
  float: right;
  display: block;
  color: #49599a;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  transition: 1s;
}

.Bnavbar a:hover {
  background-color: #3f51b5;
  color: white;
}

.Bnavbar .icon {
  display: none;
}

@media screen and (max-width: 600px) {
    .Bnavbar{display: block;
   }
  .Bnavbar a:not(:first-child) {display: none;}
  .Bnavbar a.icon {
    float: left;
    display: block;
  }
}

@media screen and (max-width: 600px) {
    .Bnavbar{
        display: block;
        width: 100%;
    }
  .Bnavbar.responsive .icon {
    position: absolute;
    left: 0;
    bottom:0;
  }
  .Bnavbar.responsive a {
    float: none;
    display: block;
    text-align: right;
  }

}
</style>
</head>
<body>

<div class="Bnavbar" id="myNavbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> خانه</a> 
  <a href="admin_area/insert_product.php"><i class="fa fa-fw fa-registered"></i> ثبت محصول</a> 
  <a href="cart.php"><i class="fa fa-fw fa-shopping-bag"></i> سبد خرید</a> 
  <a href="#"><i class="fa fa-fw fa-user"></i> ثبت نام</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myNavbar");
  if (x.className === "Bnavbar") {
    x.className += " responsive";
    
  } else {
    x.className = "Bnavbar";
  }
}
</script>

</body>
</html>


     




     




