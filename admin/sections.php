<?php 
require_once '../backends/general.php';
require_once '../models/Admin_Layout_Model.php';
$backend 	= new generalBackend();
$data 		= $backend->loadIndexInfo();
require_once '../views/Admin_Layout_View.php';
$layoutView = new Admin_Layout_View($data);

$body = $layoutView->getCommonContentSection();

echo $layoutView->getMainPage('', 'Sections', $body);

?>