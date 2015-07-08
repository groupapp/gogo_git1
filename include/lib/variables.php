<?php 
/**********************************************
*		@author : 		    Michael
*		@detail :			Common functions
*		@copyright :		2012
**********************************************/

/*--------------- Database Configuration ---------------*/
$DBConf["DB_TYPE"]	= "MySQL";
$DBConf["HOST"]     = "192.168.1.76";
$DBConf["DB_NAME"]  = "soccershopusa";
$DBConf["USER"]     = "sshopadmin";
$DBConf["PWD"]      = "Tkzjtiqusa";
/*--------------- Database Configuration --------------- */

/*** Paging Information ***/

$PAGEBLOCK      = 10;
$LIMIT          = 10;

/*** Main Tab Menu ***/
$mainMenu[]		= "Home";
$mainMenu[]     = "Purchase Order";
$mainMenu[]     = "My Account";

/*** Top Corner Menu ***/
$topMenu[] 		= array("HOME","?mmnu=0&ext=1");
$topMenu[]      = array("GOLF BUDDY WEBSITE","?mmnu=0&ext=2");
$topMenu[]      = array("HELP","?mmnu=0&ext=3");
$topMenu[]      = array("CONTACT US","?mmnu=0&ext=4");


/*** Sub Menu List ***/
$subMenu[]		= array("About Us", "Comapny");
$subMenu[]   	= array("Order List","Place New Order");
$subMenu[]   	= array("Account List","Add New Account","Pending Account");
$subMenu[]   	= array("Product","Sales Order","Sales Rep","Customers","Event Scheduler");


/*** Sub Table List ***/
$subTable[]		= array("","");
$subTable[]		= array("gb_salesorder","","");
$subTable[]		= array("qb_customer","","gb_customer");
$subTable[]		= array("gb_products","qb_salesorder","gb_salesrep","qb_customer","gb_events");


/*** Link Fields ***/
$linkField[]	= array("","");
$linkField[]	= array("SalesOrder_TxnID","","","");
$linkField[]	= array("","","");
$linkField[]	= array("ProductCode","SalesOrder_TxnID","","");


/*** Line Table List ***/
$lineTable[]	= array("","");
$lineTable[]	= array("gb_salesorder_salesorderline","","","");
$lineTable[]	= array("","","");
$lineTable[]	= array("","qb_salesorder_salesorderline","","");


/*** ID Fields ***/
$idField[]		= array("","");
$idField[]		= array("sql_id","","","");
$idField[]		= array("","","gbsql_id");
$idField[]		= array("ProductCode","TxnID","sql_id","");


/*** Search Field ***/
$subSearchField[]	= array("","");
$subSearchField[]	= array("Customer_FullName","","","");
$subSearchField[]	= array("Name","","Name");
$subSearchField[]	= array("ProductCode","Name","FullName","Name","EventTitle");


/*** Product Categories ***/
$prodCategory	= array("Standard","Program","PROMO","DEMO","P.U.P","Accessories");

/*** Order Status ***/
$orderStatus	= array("pending","processing","shipped");

/*** Company Information ***/
define("SITE_COMPANY", "Golf Buddy");
define("SITE_ADDRESS1", "20 Centerpointe Drive Suite 140");
define("SITE_ADDRESS2", "");
define("SITE_CITY", "La Palma");
define("SITE_STATE", "CA");
define("SITE_ZIPCODE", "90623");
define("SITE_COUNTRY", "US");
define("SITE_PHONE", "888-296-1428");
define("SITE_FAX", "888-515-7869");
define("SITE_EMAIL", "");
define("SITE_DOMAIN", "www.gpsgolfbuddy.com");
define("COOKIE_DOMAIN", "dev098.i9biz.com");
	
	
define("IMAGE_SAVE_PATH", "/whost/1devone/public_html/files/");
define("IMAGE_PATH", "/files/");
define("SITE_TITLE", "golfbuddy");
define("SITE_MAIL", "webpo.golfbuddy");
define("INVOICE_LINES", 20);
	
/*** Administration ***/
define("ADMIN_LEVEL", 9);
define("ADMINID", "gbadmin");
define("ADMINPW", "rhfvm79");

/*** Login Timeout ***/
define("LOGIN_TIMEOUT", 3600);		// in seconds

/*** THRESHOLE ***/
define("BESTPRICE", 1000);
define("DISCOUNT_LIMIT", 1500);
define("DISCOUNT_RATIO", 0.05);
define("FREESHIPPING", 2000);
?>
