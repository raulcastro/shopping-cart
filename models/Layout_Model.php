<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Front_Default_Header.php';

class Layout_Model
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
			$query = 'SELECT * FROM sections 
					WHERE published = 1';
			return $this->db->getArray($query);
				
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * getCategoriesBySectionId
	 *
	 * returns an array with all the categories linked to a given section id
	 *
	 * @param array $data
	 * @return boolean true on success, false othercase
	 */
	public function getCategoriesBySectionId($sectionId)
	{
		try {
			$query = 'SELECT * FROM categories
					WHERE section_id = '.$sectionId;
	
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * getLastFourProducts 
	 * 
	 * returns the last four products published that belongs at last to one category
	 * 
	 * @return boolean
	 */
	public function getLastFourProducts() {
		try {
			$query = 'SELECT p.product_id, p.name, p.brand, p.price, 
					pr.section_id,
					s.title
					FROM products p 
					LEFT JOIN products_relation pr ON p.product_id = pr.product_id
					LEFT JOIN sections s ON s.section_id = pr.section_id
					WHERE p.published = 1
					AND pr.section_id IS NOT NULL
					ORDER BY p.product_id DESC
					LIMIT 4';
			
			return $this->db->getArray($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function getProductByProductId($productId) {
		try {
			$query = 'SELECT p.product_id, p.name, p.brand, p.price,
					p.small_description, p.description, 
					pr.section_id,
					s.title
					FROM products p
					LEFT JOIN products_relation pr ON p.product_id = pr.product_id
					LEFT JOIN sections s ON s.section_id = pr.section_id
					WHERE p.published = 1
					AND pr.section_id IS NOT NULL
					AND p.product_id = '.$productId.' 
					ORDER BY p.product_id DESC
					LIMIT 4';
				
			return $this->db->getRow($query);
		} catch (Exception $e) {
			return false;
		}
	}
}

