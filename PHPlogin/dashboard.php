<?php


header("Access-Control-Allow-Origin:http://localhost:3000");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
$sessionId="92a1d8d5ac21de98650710c2cf4cd31c2fa82ead8e2005d5885c8e6fc26408ba";
session_id($sessionId);
session_start();

//echo "sessionid=".session_id()."<br>";
$data=$_SESSION['data'];
//echo "data=";
//echo $data['username'];
echo json_encode($data);


?>