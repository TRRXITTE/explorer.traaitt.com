<?php
include(dirname(__FILE__)."/../../api/config.php");

function array_to_csv_download($array, $filename = "checkpoint.csv", $delimiter=";") {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    $f = fopen('php://output', 'w');
    foreach ($array as $line) {
        fputcsv($f, $line, $delimiter);
    }
}   
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $apiNode.'/getinfo');
$result = curl_exec($ch);
$obj = json_decode($result, TRUE);
curl_close($ch);
$bestHeight = $obj['last_known_block_index'];
$bestHash = $obj['top_block_hash'];

array_to_csv_download(array(array($bestHeight,$bestHash)),"checkpoint.csv");
?>