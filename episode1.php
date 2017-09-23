<?php
$bot_id = ""; //Deine BotID brauchst du hier nur eintragen

$json_raw = file_get_contents("php://input"); //Wir holen ALLEN Input den wir gesendet bekommen in die Variable

$json_out = json_decode($json_raw); //Damit wir das was wir bekommen verwenden können jetzt mal dekodieren
?>
