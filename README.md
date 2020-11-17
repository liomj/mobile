Proof of Concept, XOOPS Mobile App

Instructions
1. Download and extract 
2. Rename mobile-master folder to mobile
3. Copy mobile folder to your XOOPS ROOT PATH
4. Open mainfile.php in your XOOPS ROOT PATH

Find the line include XOOPS_ROOT_PATH . '/include/common.php'; at the page bottom

Replace it with the following code

		$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
        $_SERVER['REQUEST_URI']; 

		if (strpos($_SERVER['REQUEST_URI'], 'mobile') !== false OR $link == XOOPS_URL . '/mobile/index.php' OR $link == XOOPS_URL . '/mobile/')
        include XOOPS_ROOT_PATH . '/mobile/common.php';
		else
		include XOOPS_ROOT_PATH . '/include/common.php';
 
5. Test Login with your XOOPS Site Username and Password (eg http://localhost/xoops/mobile/)