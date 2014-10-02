<?php

	if (!isset($_GET['sec-code'])) {
		exit;
	}
//	if ($_GET['sec-code'] != 'lightless') {
//		exit;
//	}
	// if (!isset($_GET['code'])) {
	// 	exit;
	// }

	require_once('config.php');
	// $code = SqlGuard($_GET['code'], $db);

	$seccode = SqlGuard($_GET['sec-code'], $db);

	$sql = "SELECT * FROM `remotecode` WHERE secCode='$seccode' ORDER BY ID DESC LIMIT 0,1";
	$result = $db->query($sql);

	$row = $result->fetch_assoc();
	echo $row['Code']."|".$row['isRun'];

	$id = $row['ID'];
	$sql = "UPDATE `remotecode` SET isRun=1 WHERE id=$id";
	$result = $db->query($sql);

?>
