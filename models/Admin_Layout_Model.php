<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Back_Default_Header.php';

class Admin_Layout_Model
{
    private $db; 
	
	public function __construct()
	{
		$this->db = new Mysqli_Tool(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}
	
	/**
	 * getGeneralAppInfo
	 * 
	 * get all the info that from the table app_info, this is about the application
	 * the name, url, creator and so
	 * 
	 * @return array row containing the info
	 */
	
	public function getGeneralAppInfo()
	{
		try {
			$query = 'SELECT * FROM app_info';
			return $this->db->getRow($query);
		}
		catch (Exception $e)
		{
			return false;
		}
	}
	/**
	 * getMainSlider
	 * 
	 * sliders that should be displayed in the index
	 * @param NULL 
	 * @return array on succes, false on fail 
	 */
	
	public function getMainSliders()
	{
		try {
			$query = 'SELECT * FROM main_sliders';
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * getMainSections
	 * 
	 * it gets the main sections, not the cathegory  or so
	 * @param NULL
	 * @return array on succes, false on fail 
	 */	
	public function getMainSections()
	{
		try {
			$query = 'SELECT * FROM sections';
			return $this->db->getArray($query);
				
		} catch (Exception $e) {
			return false;
		}
	}
}