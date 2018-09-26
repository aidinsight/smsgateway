<?php   
/*
    Function to send sms back from the backend v 0.1
    auteur PSMooij - 2019
    licensed under apache 2.0
*/
include_once "secrets.php";  // this includes $accountname and $configsetup PhoneNumberSid and user:pass

$body = $_GET['body'];
$number = $_GET['number'];
$url = 'https://api.twilio.com/2010-04-01/Accounts/'.$accountname.'/Messages.json';
//open connection
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, "To=".$number."&".$configsetup."&Body=".$body);
curl_setopt($ch, CURLOPT_USERPWD, $accountname . ":" . $accounttoken);
//execute post
$result = curl_exec($ch);
//close connection
curl_close($ch);
?>
