

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");
// $userid = $_POST["id"];
$userid = 18;

$getData = $db->select(array("*"),PREFIX."custom_orders","Agents_id='$userid' AND status='pending'","id desc");

if($getData){
foreach($getData as $record){

    // print_r($getData);
	$response['Order Pick Up'][$i]['id'] = $record->id;
	$response['Order Pick Up'][$i]['Order No'] = $record->Bill_no;
	$response['Order Pick Up'][$i]['Order Date'] = $record->Order_date;
	$response['Order Pick Up'][$i]['Customer Name'] = $record->Customer_id;
	$response['Order Pick Up'][$i]['Status'] = $record->status;
	$response['Order Pick Up'][$i]['Customer Phone No'] = $record->customer_phone;
	$response['Order Pick Up'][$i]['Customer Address'] = $record->Street_address;
	$response['Order Pick Up'][$i]['Customer City'] = $record->City;
	$response['Order Pick Up'][$i]['Customer Zip Code'] = $record->Zip_code;
	$response['Order Pick Up'][$i]['Pakage Type'] = $record->Package_bags_id;
	$response['Order Pick Up'][$i]['Product'] = $record->description;
	$response['Order Pick Up'][$i]['Payment Method'] = $record->payment_method;
	$response['Order Pick Up'][$i]['Amount'] = $record->amount;
    $response['success'] = 'order_detail.';

    $i++;
}

}else{
$response['failed'] = 'No Record.';

}
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>