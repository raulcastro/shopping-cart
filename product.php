<?php
require_once 'backends/general.php';
require_once 'views/Layout_View.php';
// var_dump($_GET);
$backend 	= new generalBackend();
$data 		= $backend->loadIndexInfo();

if ($_GET['productId'] > 0) {
	$currentProduct = $backend->getCurrentProduct($_GET['productId']);
	$data['currentProduct'] = $currentProduct;
}

$view 		= new Layout_View($data);

echo $view->getMainPage('view-product', 'single-product');