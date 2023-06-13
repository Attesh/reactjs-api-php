

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");
// $userid = $_POST["id"];
$userid = 18;
$date=  date('Y-m-d');
$getData = $db->select(array("*"),PREFIX."transactions","sender='$userid' AND rider_status='accept'","id desc");
$getrecord = $db->countfields("*",PREFIX."custom_orders","Agents_id='$userid' AND status='pending' AND created_at=$date");
$getpickup = $db->countfields("*",PREFIX."custom_orders","Agents_id='$userid' AND status='delivered' AND created_at=$date");
$getdelivered = $db->countfields("*",PREFIX."custom_orders","Agents_id='$userid' AND status='completed' AND created_at=$date");
$getfailed = $db->countfields("*",PREFIX."custom_orders","Agents_id='$userid' AND status='failed' AND created_at=$date");

if($getData){
    $transaction_amount=0;
    foreach($getData as $record){
      $cashinhand=$transaction_amount+$record->amount;
      $totalexpense=$transaction_amount+$record->Total_Expense;
      $cashcollect=$transaction_amount+$record->Cash_Collected;
      $i++;
    } 
}else{
    $cashinhand=0;
    $totalexpense=0;
    $cashcollect=0;
    }
    $response['Cash Summary'][] = array(
    'cash hand' => $cashinhand,
    'Total Expense' => $totalexpense,
    'Cash Collect' => $cashcollect,
    'total order' => $getrecord,
    'Pickedup' => $getpickup,
    'delivered' => $getdelivered,
    'failed' => $getfailed,
    );
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>