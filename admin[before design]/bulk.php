<?php
// Account details
$apiKey = urlencode("APIyQjRkHx111932");
// Message details
$numbers = array(918129810707, 918987654321);
$sender = urlencode("INFONE");
$message = rawurlencode("This is your message");
 
$numbers = implode(",", $numbers);
 
// Prepare data for POST request
$data = array("apikey" => $apiKey, "numbers" => $numbers, "sender" => $sender, "message" => $message);
// Send the POST request with cURL
$ch = curl_init("https://api.textlocal.in/send/");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
// Process your response here
echo $response;
?>