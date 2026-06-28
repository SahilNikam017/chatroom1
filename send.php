<?php

session_start();

//========================================
// CHECK USER LOGIN
//========================================

if(!isset($_SESSION["username"]))
{
    http_response_code(401);

    exit("Unauthorized");
}

//========================================
// FILE
//========================================

$file = "messages.json";

//========================================
// CREATE FILE IF NOT EXISTS
//========================================

if(!file_exists($file))
{
    file_put_contents($file, "[]");
}

//========================================
// USERNAME
//========================================

$username = $_SESSION["username"];

//========================================
// MESSAGE
//========================================

$message = "";

if(isset($_POST["message"]))
{
    $message = trim($_POST["message"]);
}

if($message == "")
{
    exit("Empty Message");
}

//========================================
// READ EXISTING JSON
//========================================

$json = file_get_contents($file);

$data = json_decode($json, true);

if(!is_array($data))
{
    $data = [];
}

//========================================
// NEW MESSAGE
//========================================

$newMessage =
[
    "username" => $username,

    "message" => htmlspecialchars($message),

    "time" => date("h:i:s A")
];

//========================================
// ADD MESSAGE
//========================================

$data[] = $newMessage;

//========================================
// SAVE FILE
//========================================

file_put_contents(
    $file,
    json_encode(
        $data,
        JSON_PRETTY_PRINT
    )
);

//========================================
// RESPONSE
//========================================

echo "Success";

?>