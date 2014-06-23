<?php 
require_once '../backends/general.php';
require_once '../views/Admin_Layout_View.php';

$backend 	= new generalBackend();
$data 		= $backend->loadIndexInfo();

// var_dump($data);

$layoutView = new Admin_Layout_View($data);
$body = $layoutView->getLoginSection();

echo $layoutView->getMainPage('login', 'Login', $body);
?>