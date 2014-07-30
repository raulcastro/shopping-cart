<?php 
require_once '../backends/adminGeneralBackend.php';
require_once '../models/Admin_Layout_Model.php';
$backend 	= new adminGeneralBackend();
$data 		= $backend->loadIndexInfo();
require_once '../views/Admin_Layout_View.php';
$layoutView = new Admin_Layout_View($data);

$body = $layoutView->getCommonContentSection('add-section');

echo $layoutView->getMainPage('', 'Sections', $body);

?>