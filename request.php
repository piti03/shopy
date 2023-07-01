<?php
session_start();
include_once 'includes/db.php';
$order_id_for_zarinpal=$_SESSION['order_id'];
$Amount = $_SESSION['order_totla_price'];
$MerchantId = "this id must be given by bank";
$Description = "testing the performane of application";
$email = "hrrp@hrrabi.ir";
$mobile = "09011389837";
$CallbackUrl = "https://hrrabi.ir/shop/verify.php?Amount=$Amount&order_id_for_verify=$order_id_for_zarinpal";

$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL,
]
);
$au = $result->Authority;
$sql="UPDATE `order` SET `authority`='zarinpal_$au' WHERE `order_id`=$order_id_for_zarinpal";
mysqli_query($con,$sql);
if ($result->Status == 100) {
Header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
echo'ERR: '.$result->Status;
}
?>