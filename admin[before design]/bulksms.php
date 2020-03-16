<?php
$curl = curl_init();
$data = array();
$data['api_id'] = "APIyQjRkHx111932";
//$data['api_password'] = "$2y$10$f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa/kb0zOfHCZLsF5iq";
$data['api_password'] = "%242y%2410%24f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa%2Fkb0zOfHCZLsF5iq"; 
$data['sms_type'] = "Promotional";   
$data['sender ']= "INFONE";
$data['sms_encoding'] = "text";
//$data['number'] = "+917012097581,918129810707,918129733440,918075772359";
$data['number'] = "+".$_POST['contacts'];
//$data['message'] = "Hello Guys Welcome to Infonetics Technologies LLP 11 March 2020";
$data['message'] = $_POST['message'];
//$data_string = json_encode($data);
//$url="http://www.bulksmsplans.com/api/send_sms?api_id=APIyQjRkHx111932&api_password=%242y%2410%24f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa%2Fkb0zOfHCZLsF5iq&sms_type=Promotional&sms_encoding=text&sender=INFONE&number=".$data['number']."&message=".urlencode($data['message'])."";
echo $url="http://www.bulksmsplans.com/api/send_sms_multi?api_id=APIyQjRkHx111932&api_password=%242y%2410%24f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa%2Fkb0zOfHCZLsF5iq&sms_type=Promotional&sms_encoding=text&sender=INFONE&message=".urlencode($data['message'])."&number=".$data['number']."";
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => false,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
}
?>