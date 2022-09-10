<?php

$id = "1018016823146463242";
$token = "-81FIb5em_rFRzYlr2T1jIWRucAxgI0lwSsexfiCRc7h-nFlASZ8yiQIekEFNa4f6Iz8";

$webhookurl = 'https://discord.com/api/webhooks/' . $id . '/' . $token;

$message = $_GET['message'] ?? '';
$author = $_GET['author'] ?? '';
$avatar = $_GET['avatar'] ?? '';

$json_data = json_encode([
    "username" => $author,
    "avatar_url" => $avatar,
    "content" => $message

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


$ch = curl_init($webhookurl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
curl_close($ch);