<?php

$token = "TU_TOKEN_NUEVO";

$input = file_get_contents("php://input");
$data = json_decode($input, true);

if(isset($data["message"])){

    $chat_id = $data["message"]["chat"]["id"];
    $text = $data["message"]["text"];

    $respuesta = "Hola, recibí: " . $text;

    file_get_contents(
        "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($respuesta)
    );
}

echo "OK";
