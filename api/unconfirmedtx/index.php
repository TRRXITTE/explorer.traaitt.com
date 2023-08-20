<?php
include(dirname(__FILE__)."/../../api/config.php");

$data_string = '{"jsonrpc":"2.0","id":"test","method":"f_mempool_json","params":" "}';

$ch = curl_init($apiNode.'/json_rpc');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);
$responseData = json_decode($result, TRUE);

echo count($responseData['mempool']);

print_r($responseData);

// Decode the response

// Print the date from the response
//print_r($responseData);

curl_close($ch);
?>