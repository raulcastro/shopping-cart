<?php 
require_once '../backends/adminGeneralBackend.php';
$backend 	= new adminGeneralBackend();
$data 		= $backend->loadIndexInfo();
require_once '../views/Admin_Layout_View.php';
$layoutView = new Admin_Layout_View($data);

$body = $layoutView->getCommonContentSection('settings');

echo $layoutView->getMainPage('', 'Settings', $body);

?>