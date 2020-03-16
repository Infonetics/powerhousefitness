<?php
    $to = $_POST['emails'];
	$email_arrs = explode (",", $to);  
    foreach($email_arrs as $email_arr){
		if($email_arr){
			$to= $email_arr;
		    $email= "powerhousefitnesscentre@gmail.com";
		    $text= $_POST["email_content"];
		    $sub= trim($_POST["email_subject"]);
		    $headers= 'MIME-Version: 1.0' . "\r\n";
		    $headers.= "From: " . $email . "\r\n"; // Sender's E-mail
		    $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		    $message='<p>Hi ,<p>
		    <p>'.trim($text).'</p>
		    <p>Regards,</p>
		    <p>Powerhouse Fitness,<br>
		    Sree Vinayaka Arcade, Market Jn.,<br>
		    Kottarakara, Kollam, Kerala<br>
		    powerhousefitnesscentre@gmail.com</p>';
		    if (@mail($to, $sub, $message, $headers))
		    {
		        echo 'The message has been sent.';
		    }else{
		        echo 'failed';
		    }
		}
	}
?>