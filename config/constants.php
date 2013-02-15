<?php
//CONFIG
define ("TESTMODE", false);				//CONFIGURED FOR STAGING OR PRODUCTION
define ("DEBUG", false);		
define ("DEBUG_VISIBLE", true);		// ?
define ("APPLICATION_LOCALE", "es");	// SET APPLICATION LOCALE 
define ("APPLICATION_NAME", "ARTBO"); 	//APPLICATION NAME
//FILES & DIRECTORIES //
define ("DEPENDENCES", "montana,view,model,control");		//DEPENDENCES	
define ("NOT_FOUND_FILE", "404"); 		// ?
define ("FILE_EXTENSIONS", serialize(array("", ".class", ".model", ".controller", ".inter",".helper")));
define ("START_FILE", "home");
define ("INIT_FILE", "index.php");
//DATABASE//
if (TESTMODE) 
{
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 'On');
	ini_set('display_startup_errors', 'On');
	ini_set('memory_limit', '250M'); 
	
	define ("APPLICATION_URL", "/ccb-artista/"); 
	define ("APPLICATION_FULL_URL", "http://190.145.56.83/ccb-artista/"); 
	//LOCALHOST
	define ("DB_NAME", "ccb-artist");
	define ("DB_HOST", "localhost"); 
	define ("DB_USER", "root"); 
	define ("DB_PASSWORD", "mmcrew");
}
else 
{
 	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 'Off');
	ini_set('display_startup_errors', 'Off');
	ini_set('memory_limit', '250M'); 
	
	define ("APPLICATION_URL", "/arteccb/"); 
	define ("APPLICATION_FULL_URL", "http://activemgmd.com/ccb/ccb-artista/"); 
	//LOCALHOST
	define ("DB_NAME", "ccbartistas"); 
	define ("DB_HOST", "ccbartistas.db.7704733.hostedresource.com"); 
	define ("DB_USER", "ccbartistas"); 
	define ("DB_PASSWORD", "MMc_2010+P"); 
}
//ERROR PAGES
define ("APPLICATION_404", APPLICATION_URL);
//LOCALES
define ("APPLICATION_DATE_FORMAT", "%Y-%m-%d %H:%M:%S"); 
?>
