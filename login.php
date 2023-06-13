<?php header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
include("Common/config.php");
$email = $_POST["email"];
$password = $_POST["password"];
$getrecords = $db->selectSRow(array("*"), PREFIX . "delivery_agents", "email='$email' AND password='$password' AND status='1'");
if ($getrecords) {
    $agentId = $getrecords['id']; // Replace with the actual agent ID or use any identifier
    $getrecord = $db->selectSRow(array("*"), PREFIX . "transactions", "title='Opening Balance' AND receiver='$agentId' AND status='pending' AND rider_status='pending'");

    $response['users'][] = array(
        'user_id' => $getrecords['id'],
        'email' => $getrecords['email'],
        'phone_no' => $getrecords['phone_no'],
        'success' => 'Successfully logged in.',
        'opening_balance' => $getrecord['amount'],
    );
} else {
    $response['error'] = 'Invalid Login.';
}
$json_response = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json_response;
