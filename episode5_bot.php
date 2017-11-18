<?php
$json_raw = file_get_contents("php://input");

$handle = fopen("bot.log","a+");
fwrite($handle,$json_raw . "\n\n");
fclose($handle);

$json_out = json_decode($json_raw);

include 'botid.php';
include 'send_message.php';
include 'send_photo.php';
include 'send_video.php';

$command_arr = explode(" ",$json_out->message->text);

if($command_arr[0] == "/start")
{
 sendMessage($bot_id,$json_out->message->chat->id,"Willkommen auf YouTube !");
}

if($command_arr[0] == "/bild")
{
 sendMessage($bot_id,$json_out->message->chat->id,"Okay, geb mir nen Moment !");
 sendPhoto($bot_id,$json_out->message->chat->id,"http://ytdev.chris-the-tuner.de/cutechickwithhairypussy.jpg");
}

if($command_arr[0] == "/video")
{
 sendMessage($bot_id,$json_out->message->chat->id,"Sekunde... Bin dran !");
 sendVideo($bot_id,$json_out->message->chat->id,"http://ytdev.chris-the-tuner.de/testvideo.mp4");
}
?>
