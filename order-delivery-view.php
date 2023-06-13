

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");
// $userid = $_POST["id"];
$userid = 18;

$getData = $db->select(array("*"),PREFIX."custom_orders","Agents_id='$userid' AND status='delivered'","id desc");

if($getData){
foreach($getData as $record){
	$response['Delivery'][] = array(
		'id' => $record->id,
		'Order No' => $record->Bill_no,
		'Order Date' => $record->Order_date,
		'Customer Name' => $record->Customer_id,
		'Status' => $record->status,
		'Customer Phone No' => $record->customer_phone,
		'Customer Address' => $record->Street_address,
		'Customer City' => $record->City,
		'Customer Zip Code' => $record->Zip_code,
		'Pakage Type' => $record->Package_bags_id,
		'Product' => $record->description,
		'Payment Method' => $record->payment_method,
		'Amount ' => $record->amount,
	 );
}
}else{
$response['failed'] = 'No Record.';

}
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>