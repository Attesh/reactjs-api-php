

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");
// $userid = $_POST["id"];
$userid = 18;

$getData = $db->select(array("*"),PREFIX."transactions","sender='$userid' AND rider_status='accept'","id desc");

if($getData){
foreach($getData as $record){
    $response['Cash Summary'][] = array(
        'title' => $record->title,
        'sender' => $record->sender,
        'receiver' => $record->receiver,
        'Total_Expense' => $record->Total_Expense,
        'amount' => $record->amount,
        'rider_status' => $record->rider_status,
        'Expense_type' => $record->Expense_type,
        'Cash_Collected' => $record->Cash_Collected,
        'Closing_Balance' => $record->Closing_Balance,
        'Date' => $record->date,
       
     );
}

}else{
$response['failed'] = 'No Record.';

}
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>