<?php

	//ar_dump($_SERVER);
	date_default_timezone_set('prc');

	if (!isset($_GET['sec-code'])) {
		exit;
	}

	// if ($_GET['sec-code'] != "lightless") {
	// 	exit;
	// }

	if (!isset($_GET['code'])) {
		exit;
	}

	require_once('config.php');
	$code = SqlGuard($_GET['code'], $db);

	$id = '';
	$time = date("Y-m-d H:i:s");
	$ip = $_SERVER['REMOTE_ADDR'];
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$isrun = 0;
	$seccode = SqlGuard($_GET['sec-code'], $db);

	$stmt = $db->prepare("INSERT INTO `remotecode` (ID, Code, time, IP, UA, isRun, secCode) VALUES (?,?,?,?,?,?,?)");
	$stmt->bind_param("issssis", $id, $code, $time, $ip, $ua, $isrun, $seccode);
	$affectRows = $stmt->execute();

	echo $affectRows;


?>
