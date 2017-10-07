<?php
$bot_id ="EURE BOT ID";

$ch = curl_init("https://api.telegram.org/bot" . $bot_id . "/setWebhook");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

$param = array(
 "url" => "EURE WEBHOOK URL"
);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));

$result = curl_exec($ch);
curl_close($ch);

echo $result . "\n<hr />OK";
?>
