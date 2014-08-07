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
	
	public function getCurrentUserInfo()
	{
		try {
			$query = 'SELECT u.user_id, u.user, u.type,
					ud.name, ud.email, ud.about, ud.avatar
					FROM users u 
					LEFT JOIN user_detail ud ON ud.user_id = u.user_id
					WHERE u.user_id = '.$_SESSION['userId'];
			
			return $this->db->getRow($query);
			
		} catch (Exception $e) {
			return false;
		}
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
	
	/**
	 * getSectionById
	 * 
	 * returns all the info of a section by the given id
	 * 
	 * @param int $sectionId
	 * @return multitype:|boolean
	 */
	public function getSectionById($sectionId)
	{
		try {
			$sectionId = (int) $sectionId;
			$query = 'SELECT * FROM sections WHERE section_id = '.$sectionId;
			return $this->db->getRow($query);
	
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * addSection
	 * 
	 * query for add a new section, it add it as no published 0 and with the
	 * current timestamp
	 * 
	 * @param array $data
	 * @return boolean true on success, false othercase
	 */
	public function addSection($data)
	{
		try {
			$query = 'INSERT INTO sections(title, description, keywords) 
					VALUES("'.$data['sectionTitle'].'",
							 "'.$data['sectionDescription'].'",
							 "'.$data['sectionKeywords'].'") ';
			
			return $this->db->run($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * updateSectionById
	 *
	 * this updates the info of a section by the given Id
	 *
	 * @param array $data
	 * @return boolean true on success, false othercase
	 */
	public function updateSectionById($data)
	{
		try {
			$query = 'UPDATE sections SET 
					title = "'.$data['sectionTitle'].'",  
					description = "'.$data['sectionDescription'].'",  
					keywords = "'.$data['sectionKeywords'].'" 
					WHERE section_id = '.$data['currentSectionId'];
				
			return $this->db->run($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * publishSection
	 *  
	 * set published as 1 on the section table
	 * 
	 * @param array $data array with the values from POST
	 * @return Ambigous <boolean, mixed>|boolean
	 */
	
	public function publishSection($data)
	{
		try {
			$query = 'UPDATE sections 
					SET published = 1 
					WHERE section_id = '.$data['sectionId'];
			
			return $this->db->run($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * unpublishSection
	 *
	 * set published as 0 on the section table
	 *
	 * @param array $data array with the values from POST
	 * @return Ambigous <boolean, mixed>|boolean
	 */
	
	public function unpublishSection($data)
	{
		try {
			$query = 'UPDATE sections
					SET published = 0
					WHERE section_id = '.$data['sectionId'];
				
			return $this->db->run($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * deleteSection
	 *
	 * delete a row from the sections table by the id given
	 *
	 * @param array $data array with the values from POST
	 * @return Ambigous <boolean, mixed>|boolean
	 */
	
	public function deleteSection($data)
	{
		try {
			$query = 'DELETE FROM sections
					WHERE section_id = '.$data['sectionId'];
	
			return $this->db->run($query);
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * updateAppInfo
	 * 
	 * it updates the app_info table
	 * 
	 * @param array $data post data
	 * @return boolean
	 */
	public function updateAppInfo($data)
	{
		try {
			$query = 'UPDATE app_info SET ' .
					'title = "'.$data['siteTitle'].'", ' .
					'site_name = "'.$data['siteName'].'", ' .
					'content = "'.$data['siteContent'].'", ' .
					'description = "'.$data['siteDescription'].'", ' .
					'keywords = "'.$data['siteKeywords'].'", ' .
					'twitter = "'.$data['siteTwitter'].'", ' .
					'facebook = "'.$data['siteFacebook'].'", ' .
					'googleplus = "'.$data['siteGooglePlus'].'", ' .
					'lang = "'.$data['siteLang'].'", ' .
					'pinterest = "'.$data['sitePinterest'].'", ' .
					'linkedin = "'.$data['siteLinkedin'].'", ' .
					'email = "'.$data['siteEmail'].'" ';
			
			return $this->db->run($query);
			
		} catch (Exception $e) {
			return false;
		}
	}
}