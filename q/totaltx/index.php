<?php
include(dirname(__FILE__)."/../../api/config.php");

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $apiNode.'/getinfo');
$result = curl_exec($ch);
$obj = json_decode($result, TRUE);
curl_close($ch);
print_r($obj['tx_count']);
?>