<?php header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
include("Common/config.php");
$id = 18;
$getrecords = $db->select(array("*"), PREFIX."expenses_riders", "rider_id='$id'");
if ($getrecords) {
    foreach($getrecords as $record){

    $response['Expenses'][] = array(
        'Rider_id' => $record->rider_id,
        'expenses' => $record->expense,
        'price' => $record->price,
        'Date' => $record->created_at,
     );
    }
} else {
    $response['error'] = 'Invalid Login.';
}
$json_response = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json_response; 


?>