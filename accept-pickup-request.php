

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");

$status = 'delivered';
$created_at = date('Y-m-d');
$date = date('Y-m-d');
$id = 142;
    $arr = array( "status" => $status);
		
    $result = $db->updateCondition($arr, PREFIX. "custom_orders","id=$id");

if($result){

    // print_r($getData);
    $response['success'] = 'Insert data successfully.';


}else{
$response['failed'] = 'Failed insert data.';

}
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>