<?php
// Sustituye con tu TOKEN real que te dio BotFather
$token = "8759262657:AAE8tz_BDTU-y7rh1BBcFkjUn_hpRDm-Vz8";
$website = "https://api.telegram.org/bot".$token;

// Leemos lo que nos envía Telegram
$update = file_get_contents("php://input");
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = strtolower(trim($update["message"]["text"]));

// Lógica de los pasillos (Requerimiento de la tarea)
if ($message == "carne" || $message == "queso" || $message == "jamon" || $message == "jamón") {
    $response = "El producto se encuentra en el Pasillo 1";
} 
elseif ($message == "leche" || $message == "yogurth" || $message == "cereal") {
    $response = "El producto se encuentra en el Pasillo 2";
} 
elseif ($message == "bebidas" || $message == "jugos") {
    $response = "El producto se encuentra en el Pasillo 3";
} 
elseif ($message == "pan" || $message == "pasteles" || $message == "tortas") {
    $response = "El producto se encuentra en el Pasillo 4";
} 
elseif ($message == "detergente" || $message == "lavaloza") {
    $response = "El producto se encuentra en el Pasillo 5";
} 
elseif ($message == "/start") {
    $response = "Hola! Escribe el nombre de un producto y te diré en qué pasillo está.";
} 
else {
    $response = "No entiendo la pregunta.";
}

// Enviar la respuesta de vuelta a Telegram
file_get_contents($website."/sendMessage?chat_id=".$chatId."&text=".urlencode($response));
?>
