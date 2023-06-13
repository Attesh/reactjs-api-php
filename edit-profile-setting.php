

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone_no=$_POST['phoneno'];
$updated_at = date('Y-m-d');
    $arr = array( "agent_name" => $name,"email" => $email,"phone_no" => $phone_no,"updated_at" => $updated_at);
		
    $result = $db->updateCondition($arr, PREFIX. "delivery_agents","id=$id");
if($result){
    $response['success'] = 'Updated data successfully.';
}else{
$response['failed'] = 'Failed updated data.';

}
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>