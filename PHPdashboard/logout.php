<?php
$sessionId="92a1d8d5ac21de98650710c2cf4cd31c2fa82ead8e2005d5885c8e6fc26408ba";
session_id($sessionId);

session_start();
session_destroy();
header('location:http://localhost:3000');

?>