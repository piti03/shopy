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
    
</style>
<body>
<?php 
include_once 'functions/function.php';
include_once 'includes/db.php';
?>
    <div class="container">
        <?php
        
        $order_id = $_GET['order_id_for_verify'];
        if ($_GET['Status'] == 'OK') {
            $MerchantID = "";
            $Amount = $_GET['Amount'];
            $Authority = $_GET['Authority'];
            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
            $result = $client->PaymentVerification(
		[
		'MerchantID' => $MerchantID,
		'Authority' => $Authority,
		'Amount' => $Amount,
		]
		);
            if ($result->Status == 100) {
			
		echo "<p style='background:green; padding: 27px;font-size: 20px; border-radius: 15px;border: 5px dashed white;'>از خرید شما متشکریم کد RefID برای پیگیری های بعدی شما :".$result->RefID."می باشد.</p>";
		$RefID=$result->RefID;
		mysqli_query($con,"UPDATE `order` SET `order_is_verified`='true',`refid`=$RefID WHERE `order_id`=$order_id ");			
			
		} else {
			
		echo "<p style='background:red; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'> تراکنش انجام نشد : 
		:".$result->Status."</p>";
		}
		} else {
		echo "<p style='background:red; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'> تراکنش توسط کاربر انجام نشد </p>";
			
	}			
    
        ?>
   
    </div>
   
</body>
</html>