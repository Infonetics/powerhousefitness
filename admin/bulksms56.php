<?php
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://www.bulksmsplans.com/api/send_sms?api_id=APIyQjRkHx111932&api_password=%242y%2410%24f0WKC4ezMsKFG3aYMG1A5.Yz6JjTdXaXiyKOa%2Fkb0zOfHCZLsF5iq&sms_type=Promotional&sms_encoding=text&sender=INFONE&number=+918129810707&message=test57",
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