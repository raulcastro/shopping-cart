<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root.'/Framework/Connection_Data.php');
require_once($root.'/Framework/Mysqli_Tool.php');
class Search_Model
{
    private $db; 
	
	public function __construct()
	{
		$this->db = new Mysqli_Tool(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}
	
	public function getGeneralAppInfo()
	{
		try
		{
			$query = 'SELECT * FROM app_info';
			
			return $this->db->getRow($query);
		}
		catch (Exception $e)
		{
			return false;
		}
	}
}