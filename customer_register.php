<!DOCTYP html>
<html dir="rtl">
<meta charset="UTF-8">
        <title>ثبت نام</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/4eb0ea4e39.js" crossorigin="anonymous"></script>
        <script src="js/city.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
</head>
<style>
    @font-face{
        font-family: 'nasim';
        src: url("font/Nasim.otf");
    }
    body{
        font-family: nasim;
    }
    h2{
        font-family: nasim;
    }
</style>
<body>
    <?php
    include_once 'functions/function.php';
    include_once 'includes/server.php';
    include_once 'includes/errors.php';
    ?>
    
    <div class="container-fluid bg-primary text-center p-5">
        <div class="container bg-white shadow text-center " style="border-radius:15px;">
            <h2>به  سایت فروشگاه خوش آمدید</h2>
            <p>اطلاعات مربوط به فرم کاربری را به دقت تکمیل وارسال نمایید</p>
            <div class="row">
            <div class="col-md-6">
                  <form action="customer_register.php" method="post" enctype="multipart/form-data" > 
                    <div class="mb-3 row">
                      <label for="c_name" class="col-sm-2 col-form-label">نام :</label>
                      <div class="col-sm-10">
                          <input name="c_name" type="text"  class="form-control" id="c_name" placeholder="لطفا نام خودراواردکنید" value="<?php echo $c_name; ?>"/>
                      </div>
                    </div>
                      <!--   lastname-->
                    <div class="mb-3 row">
                      <label for="c_lastname" class="col-sm-2 col-form-label">نام خانوادگی :</label>
                      <div class="col-sm-10">
                          <input name="c_lastname" type="text"  class="form-control" id="c_lastname" placeholder="لطفا نام خانوادگی خودراواردکنید" value="<?php echo $c_lastname; ?>"/>
                      </div>
                    </div>
                    <!--   gender-->  
                    <div class="mb-3 row">
                      <label for="c_gender" class="col-sm-2 col-form-label">جنسیت :</label> 
                      <div class="col-sm-10">
                          <select name="c_gender" class="form-select" aria-label="">
                              <?php 
                                if (isset($c_gender)) {
                                echo ('<option value="'.$c_gender.'" >'.$c_gender.'</option>"');
                                }
                                ?>
                            
                            <option selected value="0">انتخاب جنسیت</option>
                            <option value="مرد" >مرد</option>
                            <option value="زن" >زن</option>
                          </select>
                            
                      </div>
                    </div>
                    <!--   file-->    
                    <div class="mb-3 row">
                     <label for="c_image" class="col-sm-3 col-form-label">تصویری ازخودتان</label> 
                     <div class="col-sm-9">
                        <?php 
			if(!isset($c_image)){
                        echo('<input  class="form-control" type="file" name="c_image"/>');
			}else{
			echo $c_image;
			} 
			?>
                     </div>
                    </div>
		<!--   gender--> 	
		    <div class="mb-3 row">
                      <label for="c_email" class="col-sm-2 col-form-label"> ایمیل :</label>
                      <div class="col-sm-10">
                          <input name="c_email" type="text"  class="form-control" id="c_email" placeholder="لطفا ایمیل خودراواردکنید"/>
                      </div>
                    </div>							
                <!--   state-->         
                <div class="mb-3 row">
                   <label for="c_state" class="col-sm-2 col-form-label">استان :</label>  
                   <div class="col-sm-10">
                       <select name="state" class="form-select" onChange="iranwebsv(this.value);">
                           <option value="0">لطفا استان را انتخاب نمایید</option>
							<option value="تهران">تهران</option>
							<option value="گیلان">گیلان</option>
							<option value="آذربایجان شرقی">آذربایجان شرقی</option>
							<option value="خوزستان">خوزستان</option>
							<option value="فارس">فارس</option>
							<option value="اصفهان">اصفهان</option>
							<option value="خراسان رضوی">خراسان رضوی</option>
							<option value="قزوین">قزوین</option>
							<option value="سمنان">سمنان</option>
							<option value="قم">قم</option>
							<option value="مرکزی">مرکزی</option>
							<option value="زنجان">زنجان</option>
							<option value="مازندران">مازندران</option>
							<option value="گلستان">گلستان</option>
							<option value="اردبیل">اردبیل</option>
							<option value="آذربایجان غربی">آذربایجان غربی</option>
							<option value="همدان">همدان</option>
							<option value="کردستان">کردستان</option>
							<option value="کرمانشاه">کرمانشاه</option>
							<option value="لرستان">لرستان</option>
							<option value="بوشهر">بوشهر</option>
							<option value="کرمان">کرمان</option>
							<option value="هرمزگان">هرمزگان</option>
							<option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
							<option value="یزد">یزد</option>
							<option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
							<option value="ایلام">ایلام</option>
							<option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
							<option value="خراسان شمالی">خراسان شمالی</option>
							<option value="خراسان جنوبی">خراسان جنوبی</option>
							<option value="البرز">البرز</option>
						</select>
                   </div>
                </div>
                    
                    
                <!--city-->
                <div class="mb-3 row">
                   <label for="city" class="col-sm-2 col-form-label">نام شهر :</label> 
                   <div class="col-sm-10">
                       <select name="city" class="form-select" id="city">
			<option value="0">لطفا استان را انتخاب نمایید</option>
		       </select>
                       
                   </div>
                </div>      
                      
                <!--address-->      
                <div class="mb-3 row">
                  <label for="c_address" class="col-sm-2 col-form-label">آدرس : </label>
                  <div class="col-sm-10">
                    <input name="c_address" type="text"  class="form-control" id="c_address" placeholder="لطفا آدرس راواردکنید"/>
                  </div>
                </div>     
                <!--phone-->      
                <div class="mb-3 row">
                  <label for="c_phone" class="col-sm-2 col-form-label">تلفن همراه</label>
                  <div class="col-sm-10">
                    <input name="c_phone" type="text"  class="form-control" id="c_phone" placeholder="لطفا شماره همراه خودراواردکنید"/>
                  </div>
                </div>      
                <!--pass-->      
                <div class="mb-3 row">
                    <div class="col-sm-2">
                        
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" onclick="myFunction()">
                          <label class="form-check-label" for="gridCheck">
                         نمایش رمز
                          </label>
                         </div>
                        <script>
                            function myFunction(){
                                var x = document.getElementById("my_input_1");
                                var y = document.getElementById("my_input_2");
                                if(x.type === "password"){
                                    x.type = "text";
                                }else{
                                    x.type = "password";}
                                if(y.type === "password"){
                                    y.type = "text";
                                }else{
                                    y.type = "password"; }
                            }
                        </script>
                               
                       
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input name="c_password_1" type="password" class="form-control" id="my_input_1" placeholder="رمزعبورراواردنمایید"/>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input name="c_password_2" type="password" class="form-control" id="my_input_2" placeholder="تاییدرمزعبور"/>
                        </div>
                    </div>
                    
                </div>
                <!--submit-->
                
                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <input class="btn btn-primary btn-lg" type="submit" name="register" value="ایجاد نام کاربری">
                    </div>
                    
                </div>
                
                
                
                
                </form>
            </div>
                    
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-md-6">
                    <img src="image/regist.jpg" style="width: 100%;height: auto;border-radius: 150px; "/> 
                </div>
        </div>
        
    </div>
</body>
</html>
   





