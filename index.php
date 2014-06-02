<?php
//	error_reporting(E_ALL);
//	ini_set("display_errors", 1);

$root = $_SERVER['DOCUMENT_ROOT'];
require_once ($root . '/Framework/Connection_Data.php');
require_once ($root . '/Framework/Mysqli_Tool.php');

require_once 'models/Layout_Model.php';
require_once 'views/Layout_View.php';


echo Layout_View::getMainPage();
?>

