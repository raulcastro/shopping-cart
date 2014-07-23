<?php
//	error_reporting(E_ALL);
//	ini_set("display_errors", 1);

date_default_timezone_set('America/Mexico_City');

$root = $_SERVER['DOCUMENT_ROOT'];
require_once ($root . '/Framework/sessionControl.php');
require_once ($root . '/Framework/Connection_Data.php');
require_once ($root . '/Framework/Mysqli_Tool.php');

$control = new sessionControl($db,
		'system_users',
		'user',
		'password',
		'type',
		'',
		'expired.php',
		1);