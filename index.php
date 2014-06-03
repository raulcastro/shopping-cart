<?php
require_once 'backends/general.php';
require_once 'views/Layout_View.php';

$backend 	= new generalBackend();
$data 		= $backend->loadIndexInfo();
// var_dump($data);
$view 		= new Layout_View($data);

echo $view->getMainPage();