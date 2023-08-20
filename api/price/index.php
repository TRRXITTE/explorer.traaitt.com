<?php
include(dirname(__FILE__)."/../../api/config.php");

$url = 'https://api.crex24.com/CryptoExchangeService/BotPublic/ReturnTicker?request=[NamePairs=BTC_TCH]';

//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

$test = json_decode($result);
$array = json_decode($result, true);

echo "<hr/>Price:";

$json = '{"Error":null,"Tickers":[{"PairId": 350,"PairName":"BTC_TCH","Last": 0.000000000900000,"LowPrice": 0.000000000600000,"HighPrice": 0.000000001200000,"PercentChange": 28.5714,"BaseVolume": 0.3134481374000000000000000000,"QuoteVolume": 305358469.000000000000000, "VolumeInBtc": 0.3134481374000000000000000000,"VolumeInUsd": 3005.3964352991447331190000000}]}';

$obj = json_decode($json);
print $obj->{'Error'}; // 12345

var_dump($json);

?>
