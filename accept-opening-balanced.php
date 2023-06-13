

<?php


header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
/* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");
$title = 'Closing Balance';
$sender = $_POST["id"];
$receiver = 'Farm Fresh';
$result2 = $db->selectSRow(array("*"), PREFIX . "transactions", "receiver=$sender");

$amount = $result2['amount'];
// $Total_Expense = $_POST["Total_Expense"];
// $Expense_type = $_POST["Expense_type"];
// $Cash_Collected = $_POST["Cash_Collected"];
// $Closing_Balance = $Total_Expense + $Cash_Collected;
$status = 'pending';
$rider_status = 'accept';
$created_at = date('Y-m-d');
$date = date('Y-m-d');

$arr = array("title" => $title, "amount" => $amount, "date" => $date, "sender" => $sender, "receiver" => $receiver, "Total_Expense" => $Total_Expense, "Expense_type" => $Expense_type, "Cash_Collected" => $Cash_Collected, "Closing_Balance" => $Closing_Balance, "status" => $status, "rider_status" => $rider_status, "created_at" => $created_at);

$result = $db->updateCondition($arr, PREFIX . "transactions", "receiver=$sender");

if ($result) {

    // print_r($getData);
    $response['success'] = 'update data successfully.';
} else {
    $response['failed'] = 'Failed insert data.';
}
$json_response = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json_response;

?>