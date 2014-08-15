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
			<link rel="stylesheet" href="/css/back/jquery-ui.css" />
			<link rel="stylesheet" href="/css/back/ui.css" />
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
			<script src="/js/jquery-ui.js"></script>
			<script src="/js/back/scripts.js"></script>
			<script src="/js/back/jquery.wysiwyg.js"></script>
			<script src="/js/back/custom.js"></script>
			<script src="/js/back/cycle.js"></script>
			<script src="/js/back/jquery.checkbox.min.js"></script>
			<script src="/js/back/flot.js"></script>
			<script src="/js/back/flot.resize.js"></script>
			<script src="/js/back/flot-graphs.js"></script>
			<script src="/js/back/flot-time.js"></script>
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
					
					case 'add-section':
						echo self::getSectionsAdd();
					break;
						
					case 'settings':
						echo self::getSettingsContent();
					break;
					
					case 'update-section':
						echo self::getSectionsUpdate();
					break;
					
					case 'all-products':
						echo self::getAllProducts();
					break;
					
					case 'add-product':
						echo self::getAddProduct();
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
		            <a href="/admin/sections/"><span class="icon">&#128196;</span> Sections<span class="pip"><?php echo sizeof($this->data['sections']); ?></span></a>
		            <ul class="submenu">
		                <li><a href="/admin/add-section/">Create section</a></li>
		            </ul>   
		        </li>
		        <li>
		            <a href="/admin/products/"><span class="icon">&#59160;</span> Produtcs <span class="pip"><?php echo sizeof($this->data['products']); ?></span></a>
		            <ul class="submenu">
		                <li><a href="/admin/add-product/">New product</a></li>
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
		            <a href="/admin/settings/"><span class="icon">&#9881;</span> Settings</a>
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
	 * getAddProduct
	 *
	 * the body for add new products
	 *
	 * @return string
	 */
	public function getAddProduct()
	{
		ob_start();
		?>
		<div class="widget-container add-product">
			<section class="widget small">
				<input type="hidden" id="lastProduct" value="0">
		        <header>
		            <span class="icon">&#128196;</span>
		            <hgroup>
		                <h1>Sections</h1>
		                <h2>Choose a section</h2>
		            </hgroup>
		        </header>
		        <div class="content">
		        	<input type="hidden" id="sectionChoosed" value="0" />
		            <table id="myTable" border="0" width="100" class="add-product-sections">
		                <thead>
		                    <tr>
		                        <th>Section title</th>
		                        <th>Products</th>
		                    </tr>
		                </thead>
	                    <tbody id="sectionsList">
	                    <?php 
	                    foreach ($this->data['sections'] as $sections)
	                    {
	                    	?>
	                    	<tr>
	                            <td><input type="checkbox" sectionId="<?php echo $sections['section_id']; ?>" /> 
	                            	<a href="/admin/update-section/<?php echo $sections['section_id']; ?>/">
	                            		<?php echo $sections['title']; ?>
	                            	</a>
	                            </td>
	                            <td>0</td>
	                        </tr>
	                    	<?php 
	                    }
	                    ?>
	                    </tbody>
	                </table>
		        </div>
		    </section>
		    <section class="widget small">
		        <header>
		            <span class="icon">&#128196;</span>
		            <hgroup>
		                <h1>Categories</h1>
		                <h2>Choose cageories</h2>
		            </hgroup>
		        </header>
		        <div class="content">
		        	<ul class="categories-add-product">
		        		<h1>There is no category assigned</h1>
		        	</ul>
		        </div>
		    </section>
		</div>
		<div class="widget-container">
			<!-- ADD PRODUCT START -->
		    <div class="clr"></div>
		    <section class="widget">
		        <header>
		            <span class="icon">&#128196;</span>
		            <hgroup>
		                <h1>Add a product</h1>
		                <h2>Fill the fields</h2>
		            </hgroup>
		        </header>
		        <div class="content">
		        	<div class="field-wrap">
						<input type="text" value="Product name" id="productTitle" />
					</div>
					<div class="field-wrap">
						<textarea rows="" cols="" id="productSmallDescription">Small Description</textarea>
					</div>
					<div class="field-wrap">
						<textarea rows="" cols="" id="productDescription">Description</textarea>
					</div>
					<div class="field-wrap">
						<input type="text" value="Product brand" id="productBrand" />
					</div>
					<div class="field-wrap">
						<input type="text" value="Keywords" id="productKeywords" />
					</div>
					<div class="field-wrap">
						<input type="text" value="Stock" id="productStock" />
					</div>
					<div class="field-wrap">
						<input type="text" value="Price" id="productPrice" />
					</div>
					<button class="blue" id="buttonAddProduct" type="button">Add product</button>
		            	
	            	<div class="green alertAddProductSuccess">	
						<p>The section succesfully added</p>
						<span class="closeAlert">&#10006;</span>
					</div>
		        </div>
		    </section>
		    <!-- ADD PRODUCT END -->
		</div>
		<?php
		$sections = ob_get_contents();
		ob_end_clean();
		return $sections;
	}
	
	/**
	 * getAllProducts
	 *
	 * This view show all the products added to the shopping cart
	 *
	 * @return string
	 */
	public function getAllProducts()
	{
		ob_start();
		?>
			<section class="widget">
		        <header>
		            <span class="icon">&#128196;</span>
		            <hgroup>
		                <h1>Products</h1>
		                <h2>All products</h2>
		            </hgroup>
		        </header>
		        <div class="content">
		            <table id="myTable" border="0" width="100">
		                <thead>
		                    <tr>
		                        <th>Product Name</th>
		                        <th>Price</th>
		                        <th>Date</th>
		                        <th>Section</th>
		                        <th>Stock</th>
		                        <th>Published</th>
		                    </tr>
		                </thead>
	                    <tbody id="sectionsList">
	                    <?php 
	                    foreach ($this->data['products'] as $product)
	                    {
	                    	?>
	                    	<tr id="productRow<?php echo $product['product_id']; ?>">
	                            <td><input type="checkbox" productId="<?php echo $product['product_id']; ?>" /> 
	                            	<a href="/admin/update-section/<?php echo $product['product_id']; ?>/">
	                            		<?php echo Tools::shortString($product['name'], 27); ?>
	                            	</a>
	                            </td>
	                            <td>$<?php echo $product['price']; ?></td>
	                            <td><?php echo Tools::formatMYSQLToFront($product['curdate']); ?></td>
	                            <td><?php echo $product['title']; ?></td>
	                            <td><?php echo $product['stock']; ?></td>
	                            <td><span class="entyphochar" id="sectionIcon<?php echo $product['section_id']; ?>">
	                            <?php 
	                            if ($product['published'] == 1)
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
	                    <ul class="settings-dd sections-manage">
	                        <li><label>Publish</label><input type="checkbox" id="publishSection" act="publishSection" /></li>
	                        <li><label>Unpublish</label><input type="checkbox" act="unpublishSection" /></li>
	                        <li><label>Delete</label><input type="checkbox" act="deleteSection" /></li>
	                    </ul>
	                </span>
	            </aside>
	        </header>
	        <div class="content">
	            <table id="myTable" border="0" width="100">
	                <thead>
	                    <tr>
	                        <th>Section title</th>
	                        <th>Date</th>
	                        <th>Products</th>
	                        <th>Categories</th>
	                        <th>Published</th>
	                    </tr>
	                </thead>
                    <tbody id="sectionsList">
                    <?php 
                    foreach ($this->data['sections'] as $sections)
                    {
                    	?>
                    	<tr id="sectionRow<?php echo $sections['section_id']; ?>">
                            <td><input type="checkbox" sectionId="<?php echo $sections['section_id']; ?>" /> 
                            	<a href="/admin/update-section/<?php echo $sections['section_id']; ?>/">
                            		<?php echo $sections['title']; ?>
                            	</a>
                            </td>
                            <td><?php echo Tools::formatMYSQLToFront($sections['curdate']); ?></td>
                            <td>0</td>
                            <td>0</td>
                            <td><span class="entyphochar" id="sectionIcon<?php echo $sections['section_id']; ?>">
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
	 * getSectionsAdd
	 *
	 * add a new section
	 *
	 * @return string HTML
	 */
	public function getSectionsAdd()
	{
		ob_start();
		?>
		<section class="widget">
	        <header>
	            <span class="icon">&#128196;</span>
	            <hgroup>
	                <h1>Add a new section</h1>
	                <h2>Main sections</h2>
	            </hgroup>
	        </header>
	        <div class="content sections-add-form">
	        	<div class="field-wrap">
					<input type="text" value="Title" id="sectionTitle" />
				</div>
				<div class="field-wrap">
					<textarea rows="" cols="" id="sectionDescription">Description</textarea>
				</div>
				<div class="field-wrap">
					<input type="text" value="Keywords" id="sectionKeywords" />
				</div>
				
				<button class="blue" id="buttonAddSection" type="button">Save</button>
	            	
            	<div class="green alertAddSectionSuccess">	
					<p>The section succesfully added</p>
					<span class="closeAlert">&#10006;</span>
				</div>
	        </div>
	    </section>
		<?php
		$sections = ob_get_contents();
		ob_end_clean();
		return $sections;
	}
	
	/**
	 * getSectionsUpdate
	 *
	 * update a new section view
	 *
	 * @return string HTML
	 */
	public function getSectionsUpdate()
	{
		ob_start();
		?>
		<section class="widget">
	        <header>
	            <span class="icon">&#128196;</span>
	            <hgroup>
	                <h1>Update <?php echo $this->data['currentSection']['title']; ?></h1>
	                <h2>Main sections</h2>
	            </hgroup>
	        </header>
	        <div class="content sections-update-form">
	        	<input type="hidden" id="currentSectionId" value="<?php echo $this->data['currentSection']['section_id']; ?>" />
	        	<div class="field-wrap">
					<input type="text" value="<?php echo $this->data['currentSection']['title']; ?>" id="sectionTitle" />
				</div>
				<div class="field-wrap">
					<textarea rows="" cols="" id="sectionDescription"><?php echo $this->data['currentSection']['description']; ?></textarea>
				</div>
				<div class="field-wrap">
					<input type="text" value="<?php echo $this->data['currentSection']['keywords']; ?>" id="sectionKeywords" />
				</div>
				
				<button class="blue" id="buttonUpdateSection" type="button">Update</button>
	            	
            	<div class="green alertUpdateSectionSuccess">	
					<p>The section was succesfully updated</p>
					<span class="closeAlert">&#10006;</span>
				</div>
	        </div>
	    </section>
	    
	    <section class="widget">
	        <header>
	            <span class="icon">&#9776;</span>
	            <hgroup>
	                <h1>Add categories </h1>
	                <h2><?php echo $this->data['currentSection']['title']; ?></h2>
	            </hgroup>
	        </header>
	        <div class="content categories-add-form">
	        	<div class="field-wrap">
					<input type="text" value="Title" id="categoryTitle" />
				</div>
				<div class="field-wrap">
					<textarea rows="" cols="" id="categoryDescription">Description</textarea>
				</div>
				<div class="field-wrap">
					<input type="text" value="Keywords" id="categoryKeywords" />
				</div>
				
				<button class="blue" id="buttonAddCategory" type="button">Add category</button>
	            	
            	<div class="green alertAddCategorySuccess">	
					<p>The category was succesfully added</p>
					<span class="closeAlert">&#10006;</span>
				</div>
	        </div>
	    </section>
	    <div class="widget-container">
			<section class="widget">
				<header>
					<span class="icon">&#9776;</span>
					<hgroup>
						<h1>Categories</h1>
						<h2><?php echo $this->data['currentSection']['title']; ?></h2>
					</hgroup>
				</header>
				<div class="content">
					<div id="accordion">
						<?php 
						if ($this->data['currentSectionCategories'])
						{
							foreach ($this->data['currentSectionCategories'] as $category) {
								?>
						<h3 id="titleCategoryAccordion<?php echo $category['category_id']; ?>"><?php echo $category['title']; ?></h3>
						  <div>
						    <div class="content categories-update-form">
						    	<input type="hidden" value="<?php echo $category['category_id']; ?>" class="categoryId" />
					        	<div class="field-wrap">
									<input type="text" value="<?php echo $category['title']; ?>" class="categoryTitle" />
								</div>
								<div class="field-wrap">
									<textarea rows="" cols="" class="categoryDescription"><?php echo $category['description']; ?></textarea>
								</div>
								<div class="field-wrap">
									<input type="text" value="<?php echo $category['keywords']; ?>" class="categoryKeywords" />
								</div>
								
								<button class="blue buttonUpdateCategory" type="button">Update</button>
					            	
					            <button class="red buttonDeleteCategory" type="button">Delete</button>
					            
				            	<div class="green alertUpdateCategorySuccess">	
									<p>The category was succesfully updated</p>
									<span class="closeAlert">&#10006;</span>
								</div>
					        </div>
						  </div>
								<?php 
							}
						}
						?>
					</div>
			</section>
		</div>
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
		        </header>
		        <div class="content">
		            <form class="form-row settings-form">
		            	<label>Site title</label>
		            	<input type="text" id="siteTitle" value="<?php echo $this->data['appInfo']['title']; ?>" />
		            	
		            	<label>Site name</label>
		            	<input type="text" id="siteName" value="<?php echo $this->data['appInfo']['siteName']; ?>" />
		            	
		            	<label>Inner content</label>
		            	<textarea rows="" id="siteContent" cols=""><?php echo $this->data['appInfo']['content']; ?></textarea>
		            	
		            	<label>Description</label>
		            	<textarea rows="" id="siteDescription" cols=""><?php echo $this->data['appInfo']['description']; ?></textarea>
		            	
		            	<label>Keywords</label>
		            	<input type="text" id="siteKeywords" value="<?php echo $this->data['appInfo']['keywords']; ?>" />
		            	
		            	<label>Contact e-mail</label>
		            	<input type="text" id="siteEmail" value="<?php echo $this->data['appInfo']['email']; ?>" />
		            	
		            	<label>Twitter</label>
		            	<input type="text" id="siteTwitter" value="<?php echo $this->data['appInfo']['twitter']; ?>" />
		            	
		            	<label>Facebook</label>
		            	<input type="text" id="siteFacebook" value="<?php echo $this->data['appInfo']['facebook']; ?>" />
		            	
		            	<label>Google+</label>
		            	<input type="text" id="siteGooglePlus" value="<?php echo $this->data['appInfo']['googleplus']; ?>" />
		            	
		            	<label>Pinterest</label>
		            	<input type="text" id="sitePinterest" value="<?php echo $this->data['appInfo']['pinterest']; ?>" />
		            	
		            	<label>Linkedin</label>
		            	<input type="text" id="siteLinkedin" value="<?php echo $this->data['appInfo']['linkedin']; ?>" />
		            	
		            	<label>Lang</label>
		            	<input type="text" id="siteLang" value="<?php echo $this->data['appInfo']['lang']; ?>" />
		            	
		            	<button class="blue" id="buttonSaveSattings" type="button">Save</button>
		            	
		            	<div class="green alertSettingsSuccess">	
							<p>The configuration was succesfully saved</p>
							<span class="closeAlert">&#10006;</span>
						</div>
		            </form>
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