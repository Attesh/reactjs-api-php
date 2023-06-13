

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");

$rider_id = '18';
$expense = '2,3';
$price = '200';
$created_at = date('Y-m-d');
$updated_at = date('Y-m-d');
    $arr = array( "rider_id" => $rider_id,"expense" => $expense,"price" => $price,"created_at" => $created_at,"updated_at" => $updated_at);
		
    $result = $db->insert($arr, PREFIX. "expenses_riders");

if($result){

    // print_r($getData);
    $response['success'] = 'Insert data successfully.';


}else{
$response['failed'] = 'Failed insert data.';

}
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>