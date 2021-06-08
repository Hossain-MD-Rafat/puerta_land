
<?php
$db=new mysqli("localhost","root","","puerta_update");
// Connect with the database 
//$db = new mysqli("localhost", "root", "", "rafathas_project"); 
// Display error if failed to connect 
if ($db->connect_errno) { 
printf("Connect failed: %s\n", $db->connect_error); 
}

$url = "https://free.currconv.com/api/v7/convert?q=USD_MXN&compact=ultra&apiKey=f7607a1f31c2bc812fe6";

$json = file_get_contents($url);
$json = (array)json_decode($json);
$json['USD_MXN'];
$usd = floatval($json['USD_MXN']);
$query = "UPDATE currency_converter SET usd=$usd WHERE id=1";
$res = mysqli_query($db, $query);

?>