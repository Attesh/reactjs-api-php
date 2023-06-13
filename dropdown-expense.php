

<?php


header('Access-Control-Allow-Origin: *'); 
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
 /* error_reporting(E_ALL);
ini_set("display_errors", 1); */
include("Common/config.php");
// $userid = $_POST["id"];
$getData = $db->select(array("*"),PREFIX."Expenses");

if($getData){
foreach($getData as $record){
	$response['expenses'][] = array(
        'id' => $record->id,
        'title' => $record->title,
     );
}
}else{
$response['failed'] = 'No Record.';

}
 $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    echo $json_response;

?>