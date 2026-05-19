<?php

$token = "TU_TOKEN_NUEVO";

$content = file_get_contents("php://input");

$data = json_decode($content, true);

if (isset($data["message"])) {

    $chat_id = $data["message"]["chat"]["id"];
    $text = $data["message"]["text"];

    $mensaje = "Recibido: " . $text;

    $url = "https://api.telegram.org/bot".$token."/sendMessage";

    $post = [
        'chat_id' => $chat_id,
        'text' => $mensaje
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($post),
        ],
    ];

    $context = stream_context_create($options);

    file_get_contents($url, false, $context);
}

echo "OK";
