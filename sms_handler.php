<?php
/*
    Function simple parser api endpoint v 0.1
    Auteur PSMooij - 2019
    Licensed under apache 2.0
*/

$msg = $_GET['msg'];
$mobile = $_GET['mobile'];


sendtoslack($msg, $mobile);
API($msg, $mobile);

// setup
$urlhooks = "xxx";
$urlbackend = "xxx";

// TO test and monitor progress * remove in production... 
function sendtoslack($msg, $mobile,$urlhooks){
$url = $urlhooks;
//open connection
$ch = curl_init();
curl_setopt($ch,CURLOPT_POST, 1);  
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"text": " body-'.$msg.' phone-'.$mobile.'"}');
//execute post
$result = curl_exec($ch);
//close connection
curl_close($ch);
}


function API($msg, $mobile,$urlbackend){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlbackend);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"title":"'.$mobile.'","description":"'.$msg.'"}');

$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
//close connection
curl_close($ch);
}



?>

