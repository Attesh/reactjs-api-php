

<?php


header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
/* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");
$userid = $_POST["id"];

// $userid = 18;

$getData = $db->select(array("*"), PREFIX . "transactions", "receiver='$userid' AND rider_status='pending'", "id desc");

if ($getData) {
    foreach ($getData as $record) {

        // print_r($getData);
        $response['Opening Balance'][$i]['title'] = $record->title;
        $response['Opening Balance'][$i]['amount'] = $record->amount;
        $response['Opening Balance'][$i]['status'] = $record->status;
        $response['Opening Balance'][$i]['rider_status'] = $record->rider_status;
        $response['success'] = 'order_detail.';

        $i++;
    }
} else {
    $response['failed'] = 'No Record.';
}
$json_response = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json_response;

?>