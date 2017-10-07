<?php
$json_raw = file_get_contents("php://input");

$handle = fopen("bot.log","a+");
fwrite($handle,$json_raw . "\n\n");
fclose($handle);

$json_out = json_decode($json_raw);

$bot_id = "EURE BOT ID";
include 'send_message.php';

$command_arr = explode(" ",$json_out->message->text);

if($command_arr[0] == "/start")
{
 sendMessage($bot_id,$json_out->message->chat->id,"Hallo du da, schön dass du mich ansprichst.");
}

if($command_arr[0] == "Hi")
{
 sendMessage($bot_id,$json_out->message->chat->id,"Cool auch das klappt.");
}
?>
