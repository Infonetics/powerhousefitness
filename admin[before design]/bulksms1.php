<?php
$curl = curl_init();
$data = array();
$data['api_id'] = "APIyQjRkHx111932";
//$data['api_password'] = "$2y$10$f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa/kb0zOfHCZLsF5iq";
$data['api_password'] = "%242y%2410%24f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa%2Fkb0zOfHCZLsF5iq"; 
$data['sms_type'] = "Promotional";   
$data['sender ']= "INFONE";
$data['sms_encoding'] = "1";
$data['number'] = "+918129810707";
$data['message'] = "Hello Guys Congratulation you are getting new rank in Alexa";
echo $data_string = json_encode($data);
$ch = curl_init('https://www.bulksmsplans.com/api/send_sms');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);
echo "<pre>";print_r($ch);
$result = curl_exec($ch);
echo "<pre>";print_r(curl_getinfo($ch));
//echo $redirectURL = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL );
echo $result;
//https://www.bulksmsplans.com/api/send_sms?api_id=APIyQjRkHx111932&api_password=%242y%2410%24f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa%2Fkb0zOfHCZLsF5iq&sms_type=Promotional&sms_encoding=text&sender=INFONE&number=+918129810707&message=Hello Guys Congratulation you are getting new rank in Alexa
exit;
?>