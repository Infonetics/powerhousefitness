<?php
//sending email with the php mail()

$to = 'anithajose1809@gmail.com'; // note the comma

// Subject
$subject = 'Test Contact Us Form';

// Message
$message = '
<html>
<head>
  <title>Contact Us Form</title>
</head>
<body>
  <p>Hi,</p>
  </br>
  <p>To check the mail is working or not!!!</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: Emperor Gym<admin@emperorgym.ae>,sales@emperorgym.ae, Anitha <anithajose1809@gmail.com> ';
$headers[] = 'From: Riya <riya.serjan@gmail.com>';
$headers[] = 'Cc: admin@emperorgym.ae';
$headers[] = 'Bcc: admin@emperorgym.ae';

// Mail it
echo "<pre>";print_r($headers);
echo $message;
$success = mail($to, $subject, $message, implode("\r\n", $headers));
if (!$success) {
    $errorMessage = error_get_last()['message'];
}
?>