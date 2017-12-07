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
include 'send_inlinekeyboard.php';

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

if($command_arr[0] == "/inline1")
{
 $arr1 = array('text' => "Button 1", 'callback_data' => "DATEN 1");
 $arr2 = array('text' => "Button 2", 'callback_data' => "DATEN 2");
 $arr3 = array('text' => "Button 3", 'callback_data' => "DATEN 3");

 $keyboard = array(array($arr1, $arr2, $arr3));

 sendInlineKeyboard($bot_id,$json_out->message->chat->id,"Wähle aus",$keyboard);
}

if($command_arr[0] == "/inline2")
{
 $arr1 = array('text' => "Button 1", 'callback_data' => "DATEN 1");
 $arr2 = array('text' => "Button 2", 'callback_data' => "DATEN 2");
 $arr3 = array('text' => "Button 3", 'callback_data' => "DATEN 3");

 $keyboard = array(array($arr1), array($arr2), array($arr3));

 sendInlineKeyboard($bot_id,$json_out->message->chat->id,"Wähle aus",$keyboard);
}
?>
