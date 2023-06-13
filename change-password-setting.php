<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");
ini_set('allow_url_fopen', 'On');
include("Common/config.php");

$id = $_POST['id'];
$oldpassword = $_POST['oldpassword'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$updated_at = date('Y-m-d');

$getrecords = $db->selectSRow(array("*"), PREFIX . "delivery_agents", "id='$id'");
if ($getrecords) {
    $checkpassword = $getrecords['password'];
    if ($checkpassword == $oldpassword) {
        if ($password == $confirmpassword) {
            $arr = array("password" => $password, "updated_at" => $updated_at);
            $result = $db->updateCondition($arr, PREFIX . "delivery_agents", "id=$id");
            if ($result) {
                $response['Success'] = 'password successfully changed.';
            } else {
                $response['error'] = 'Something worng please try again later.';
            }
        } else {
            $response['password'] = 'password and confirm password are not matched.';
        }
    } else {
        $response['password'] = 'old password are not matched.';
    }
} else {
    $response['failed'] = 'No  Record found.';
}
$json_response = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $json_response;

?>