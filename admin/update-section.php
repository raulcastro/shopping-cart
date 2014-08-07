<?php 
require_once '../backends/adminGeneralBackend.php';
require_once '../models/Admin_Layout_Model.php';
$backend 	= new adminGeneralBackend();
$data 		= $backend->loadIndexInfo();
if ($_GET['sectionId'] > 0) {
	$currentSection = $backend->getCurrentSection($_GET['sectionId']);
	$data['currentSection'] = $currentSection;
}
require_once '../views/Admin_Layout_View.php';
$layoutView = new Admin_Layout_View($data);

$body = $layoutView->getCommonContentSection('update-section');

echo $layoutView->getMainPage('', 'Sections', $body);

?>