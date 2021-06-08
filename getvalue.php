<?php
$db=new mysqli("localhost","root","","puerta_update");
// Connect with the database 
//$db = new mysqli("localhost", "root", "", "rafathas_project"); 
// Display error if failed to connect 
if ($db->connect_errno) { 
printf("Connect failed: %s\n", $db->connect_error); 
}

$id = $_GET["q"];
$id = (int)$id;
// $value = mysqli_query($db, "select area,width,large,total,administrative,enganche,12months,24months from puerta_info where id=$id");
$value = mysqli_query($db, "select avg_width, avg_height, total, final_price, cash_price, 12_months, 24_months, 36_months, administrative, down_payment_cash, down_payment_12, down_payment_24, down_payment_36 from puerta_info where lote=$id");
$row = mysqli_fetch_array($value);
$currency = mysqli_query($db, "SELECT * FROM currency_converter WHERE id=1");
$row1 = mysqli_fetch_array($currency);
// $buildtext = $row['area']." ".$row['width']." ".$row['large']." ".$row['total']." ".$row['administrative']." ".$row['enganche']." ".
// $row['12months']." ".$row['24months'];
$buildtext = $row['avg_width']." ".$row['avg_height']." ".$row['total']." ".$row['final_price']." ".$row['cash_price']." ".$row['12_months']." ".$row['24_months']." ".$row['36_months']." ".$row['administrative']." ".$row['down_payment_cash']." ".$row['down_payment_12']." ".$row['down_payment_24']." ".$row['down_payment_36']." ".$row1['usd'];
echo $buildtext;
mysqli_close($db);
?>