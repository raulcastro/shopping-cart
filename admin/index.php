<?php 
require_once '../backends/general.php';

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

$root = $_SERVER['DOCUMENT_ROOT'];

require_once($root.'/Framework/sessionControl.php');
require_once($root.'/Framework/Connection_Data.php');
require_once($root.'/Framework/Mysqli_Tool.php');

$db =  new Mysqli_Tool(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$typesPages = array(1=>"dashboard.php");

$control = new sessionControl($db,
		'users',
		'user',
		'password',
		'type',
		$typesPages,
		'index.php',
		0);

require_once '../views/Admin_Layout_View.php';

$backend 	= new generalBackend();
$data 		= $backend->loadIndexInfo();

$layoutView = new Admin_Layout_View($data);
$body = $layoutView->getLoginSection();

echo $layoutView->getMainPage('login', 'Login', $body);
?>