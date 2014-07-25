<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Tools.php';

class Admin_Layout_View
{
	private $data;
	private $currentTitle;
	
	public function __construct($data) {
		$this->data = $data;
	}
	
	/**
	 * Return the complete HTML Document, from <html> to </html> tag. The section
	 * it's an string, it can be login, dashboard and so, it calls another 
	 * basically functions by itself. 
	 * 
	 * @param string $section
	 * @param string $title
	 * @param string $body
	 * @return string
	 */
	public function getMainPage($section = '', $title = '', $body = '') {
		ob_start();
		$this->currentTitle = $title;
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<?php echo self::getMainHeader(); ?>
	</head>
	
	<body class="<?php echo $section; ?>">
		<?php echo $body; ?>
		<?php echo self::getGeneralScripts(); ?>
	</body>
	</html>
	<?php
		$mainPage = ob_get_contents();
		ob_end_clean();
		return $mainPage;
	}
	
	public function getMainHeader(){
		ob_start();
	?>
		<meta charset="utf-8">
		<title><?php echo $this->data['appInfo']['title']; ?> - <?php echo $this->currentTitle; ?></title>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<?php echo self::getGeneralCSS(); ?>
		
	<?php 
		$mainHeader = ob_get_contents();
		ob_end_clean();
		return $mainHeader;
	}
	
	/**
	 * getGeneralCSS
	 *
	 * it returns the common css needed for all the pages of the website
	 * @param NULL
	 * @return string html code
	 */
	
	public static function getGeneralCSS()
	{
		ob_start();
		?>
			<link rel="stylesheet" href="/css/back/style.css" media="all" />
		<?php 
		$generalCSS = ob_get_contents();
		ob_end_clean();
		return $generalCSS;
	}
		
		/**
		 * getGeneralScripts
		*
		* it returns the common JS needed for all the pages of the website
		* @param NULL
		* @return string html code
		*/
		
		public static function getGeneralScripts()
		{
			ob_start();
			?>
			<script src="/js/jquery-1.6.1.min.js"></script>
			<script src="/js/back/scripts.js"></script>
			<script src="/js/back/jquery.wysiwyg.js"></script>
			<script src="/js/back/custom.js"></script>
			<script src="/js/back/cycle.js"></script>
			<script src="/js/back/jquery.checkbox.min.js"></script>
			<script src="/js/back/flot.js"></script>
			<script src="/js/back/flot.resize.js"></script>
			<script src="/js/back/flot-graphs.js"></script>
			<script src="/js/back/flot-time.js"></script>
			<script src="/js/back/cycle.js"></script>
			<script src="/js/back/jquery.tablesorter.min.js"></script>
			<?php 
			$generalScripts = ob_get_contents();
			ob_end_clean();
			return $generalScripts;
		}
	
	/**
	 * getCommonContentSection
	 * 
	 * most of the body structure around the backend
	 * 
	 * @return string
	 */
	public function getCommonContentSection($page)
	{
		ob_start();
		?>
		<?php echo self::getTopArea(); ?>
		<?php echo self::getSideBar(); ?>
		<?php echo self::getMainAlert(); ?>
		<section class="content">
			<?php 
				switch ($page)
				{
					case 'sections':
						echo self::getSectionsContent();
					break;
						
					case 'settings':
						echo self::getSettingsContent();
					break;
				}
			?>
		
			<?php  ?>
		</section>
		<?php
		$body = ob_get_contents();
		ob_end_clean();
		return $body;
	}
	
	/**
	 * getTopArea
	 * here we display the top header with the name of the company, and also the 
	 * name of user, the pendinf notifications, log-oout functions and so
	 * 
	 * @return string
	 */
	public function getTopArea()
	{
		ob_start();
		?>
		<div class="testing">
			<header class="main">
			    <h1><strong><?php echo $this->data['appInfo']['siteName']; ?></strong> Dashboard</h1>
			    <input type="text" value="search" />
			</header>
			<section class="user">
			    <div class="profile-img">
			        <p>
<!-- 			        	<img src="images/uiface2.png" alt="" height="40" width="40" />  -->
			        Welcome back <?php echo $this->data['userInfo']['userName']; ?></p>
			    </div>
			    <?php echo self::getTopNotifications(); ?>
			</section>
		</div>
		<?php
		$sideBar = ob_get_contents();
		ob_end_clean();
		return $sideBar;
	}
	
	/**
	 * getTopNotifications
	 * 
	 * it shows the last notifications, like inbox, and others
	 * 
	 * @return string
	 */
	
	public function getTopNotifications()
	{
		ob_start();
		?>
		<div class="buttons">
	        <button class="ico-font">&#59157;</button>
	        <span class="button dropdown">
	            <a href="#">Notifications <span class="pip">4</span></a>
	            <ul class="notice">
	                <li>
	                    <hgroup>
	                        <h1>You have a new task</h1>
	                        <h2>Report web statistics week by week.</h2> 
	                    </hgroup>
	                    <p><span>14:24</span></p>
	                </li>
	            </ul>
	        </span> 
	        <span class="button dropdown">
	            <a href="#">Inbox <span class="pip">6</span></a>
	            <ul class="notice">
	                <li>
	                    <hgroup>
	                        <h1>Hi, I need a favour</h1>
	                        <h2>John Doe</h2>
	                        <h3>Lorem ipsum dolor sit amet, consectetuer sed aidping putamus delo de sit felume...</h3>
	                    </hgroup>
	                    <p><span>11:24</span></p>
	                </li>
	            </ul>
	        </span> 
	        <span class="button">Live</span>
	         <span class="button">Help</span>
	         <span class="button blue"><a href="index.html">Logout</a></span>
	    </div>
		<?php
		$notifications = ob_get_contents();
		ob_end_clean();
		return $notifications;
	}
	
	/**
	 * getSideBar
	 *
	 * it's the main menu of the background
	 * @return string
	 */
	public function getSideBar()
	{
		ob_start();
		?>
		<nav>
		    <ul>
		        <li><a href="dashboard.html"><span class="icon">&#59176;</span> Dashboard</a></li>
		        <li class="section">
		            <a href="pages-table.html"><span class="icon">&#128196;</span> Sections<span class="pip"><?php echo sizeof($this->data['sections']); ?></span></a>
		            <ul class="submenu">
		                <li><a href="page-new.html">Create section</a></li>
		            </ul>   
		        </li>
		        <li>
		            <a href="files.html"><span class="icon">&#127748;</span> Sliders <span class="pip"><?php echo sizeof($this->data['mainSliders']); ?></span></a>
		            <ul class="submenu">
		                <li><a href="files-upload.html">New slider</a></li>
		                <li><a href="files.html">View sliders</a></li>
		            </ul>
		        </li>
		        <li>
		            <a href="blog-timeline.html"><span class="icon">&#59160;</span> Produtcs <span class="pip">12</span></a>
		            <ul class="submenu">
		                <li><a href="blog-new.html">New product</a></li>
		                <li><a href="blog-table.html">All products</a></li>
		            </ul>
		        </li>
		        <li>
		            <a href="blog-timeline.html"><span class="icon">&#59160;</span> Blog <span class="pip">12</span></a>
		            <ul class="submenu">
		                <li><a href="blog-new.html">New post</a></li>
		                <li><a href="blog-table.html">All posts</a></li>
		                <li><a href="comments-timeline.html">View comments</a></li>
		            </ul>
		        </li>
		        <li><a href="statistics.html"><span class="icon">&#128202;</span> Statistics</a></li>
		        <li><a href="users.html"><span class="icon">&#128101;</span> Users <span class="pip">3</span></a></li>
		        <li>
		            <a href="settings.php"><span class="icon">&#9881;</span> Settings</a>
		        </li>
		    </ul>
		</nav>
		<?php
		$sideBar = ob_get_contents();
		ob_end_clean();
		return $sideBar;
	}
	
	/**
	 * getMainAlert
	 * 
	 * it's the first option before the content
	 * 
	 * @return string
	 */
	public function getMainAlert()
	{
		ob_start();
		?>
		<section class="alert">
		    <form method="link" action="page-new.html">
		         <button class="green">Add new product</button>
		    </form>
		</section>
		<?php
		$alert = ob_get_contents();
		ob_end_clean();
		return $alert;
	}
	
	/**
	 * getSectionsContent
	 * 
	 * the body for the sections 
	 * 
	 * @return string
	 */
	public function getSectionsContent()
	{
		ob_start();
		?>
		<section class="widget">
	        <header>
	            <span class="icon">&#128196;</span>
	            <hgroup>
	                <h1>Sections</h1>
	                <h2>Main sections</h2>
	            </hgroup>
	            <aside>
	                <span>
	                    <a href="#">&#9881;</a>
	                    <ul class="settings-dd">
	                        <li><label>Create section</label><input type="checkbox" /></li>
	                        <li><label>Publish</label><input type="checkbox" checked="checked" /></li>
	                        <li><label>Unpublish</label><input type="checkbox" /></li>
	                        <li><label>Delete</label><input type="checkbox" /></li>
	                    </ul>
	                </span>
	            </aside>
	        </header>
	        <div class="content">
	            <table id="myTable" border="0" width="100">
	                <thead>
	                    <tr>
	                        <th>Section title</th>
	                        <th >Date</th>
	                        <th>Products</th>
	                        <th>Stock</th>
	                        <th>Published</th>
	                    </tr>
	                </thead>
	                    <tbody>
	                    <?php 
	                    foreach ($this->data['sections'] as $sections)
	                    {
	                    	?>
	                    	<tr>
	                            <td><input type="checkbox" /> <?php echo $sections['title']; ?></td>
	                            <td><?php echo Tools::formatMYSQLToFront($sections['curdate']); ?></td>
	                            <td>0</td>
	                            <td>0</td>
	                            <td><span class="entyphochar">
	                            <?php 
	                            if ($sections['published'] == 1)
	                            {
	                            	?>
	                            	&#10003;
	                            	<?php
	                            }
	                            else 
	                            {
	                            	?>
	                            	&#128683;
	                            	<?php
	                            }
	                            ?>
	                            </span></td>
	                        </tr>
	                    	<?php 
	                    }
	                    ?>
	                    </tbody>
	                </table>
	        </div>
	    </section>
		<?php
		$sections = ob_get_contents();
		ob_end_clean();
		return $sections;
	}
	/**
	 * getSettingsContent
	 * 
	 * @return string
	 */
	public function getSettingsContent()
	{
		ob_start();
		?>
			<section class="widget">
		        <header>
		            <span class="icon">&#128196;</span>
		            <hgroup>
		                <h1>Settings</h1>
		                <h2>Main sections</h2>
		            </hgroup>
		            <aside>
		                <span>
		                    <a href="#">&#9881;</a>
		                    <ul class="settings-dd">
		                        <li><label>Create section</label><input type="checkbox" /></li>
		                        <li><label>Publish</label><input type="checkbox" checked="checked" /></li>
		                        <li><label>Unpublish</label><input type="checkbox" /></li>
		                        <li><label>Delete</label><input type="checkbox" /></li>
		                    </ul>
		                </span>
		            </aside>
		        </header>
		        <div class="content">
		            <table id="myTable" border="0" width="100">
		                <thead>
		                    <tr>
		                        <th>Section title</th>
		                        <th >Date</th>
		                        <th>Products</th>
		                        <th>Stock</th>
		                        <th>Published</th>
		                    </tr>
		                </thead>
		                    <tbody>
		                    <?php 
		                    foreach ($this->data['sections'] as $sections)
		                    {
		                    	?>
		                    	<tr>
		                            <td><input type="checkbox" /> <?php echo $sections['title']; ?></td>
		                            <td><?php echo Tools::formatMYSQLToFront($sections['curdate']); ?></td>
		                            <td>0</td>
		                            <td>0</td>
		                            <td><span class="entyphochar">
		                            <?php 
		                            if ($sections['published'] == 1)
		                            {
		                            	?>
		                            	&#10003;
		                            	<?php
		                            }
		                            else 
		                            {
		                            	?>
		                            	&#128683;
		                            	<?php
		                            }
		                            ?>
		                            </span></td>
		                        </tr>
		                    	<?php 
		                    }
		                    ?>
		                    </tbody>
		                </table>
		        </div>
		    </section>
			<?php
			$sections = ob_get_contents();
			ob_end_clean();
			return $sections;
		}
	
	
	/**
	 * getLoginSection
	 * 
	 * This only works for the login section, it's and special one
	 * @return string
	 */
	public function getLoginSection(){
		ob_start();
	?>
		<section>
			<h1>
				<strong><?php echo $this->data['appInfo']['siteName']; ?></strong> 
				Dashboard
			</h1>
			
			<form method="post" id="login-form" 
					action="<?php echo $_SERVER['REQUEST_URI']; ?>">
				<input type="text" value="Email" name="loginUser" />
				<input value="Password" type="password" name="loginPass" />
				<input type="hidden" name="submitButton" value="1">
				<button class="blue">Login</button>
			</form>
			<p><a href="#">Forgot your password?</a></p>
		</section>
	<?php 
		$loginSection = ob_get_contents();
		ob_end_clean();
		return $loginSection;
	}	
}