<?php 

ini_set('session.cookie_httponly', true);

session_start();

//lock to a specify ip address
if (isset($_SESSION['last_ip']) === false) {
	$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
}

if ($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
	session_unset();
	session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Session Hijack</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<p>
	Create ini_set('session.cookie_httponly', ture);
</p>
</body>
</html>