<?PHP
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function send_mail($mailTo, $mailFrom, $subject, $mailcontain, $all_email_id=NULL)
	{  
		$to      = $mailTo;
		$from 	 = $mailFrom;
		$subject = $subject;
		$message = $mailcontain;

		$boundary = "np4cd39f8e6d08f";
		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$headers .= "From: ". $from . "\r\n";
		$headers .= "Cc: ". $all_email_id . "\r\n";
		$headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

		if(mail($to,$subject,$message,$headers))
			return true;
		else 
			return false;
	}
 ?>