<?php  
/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
*/

/* Custom error reporting */

define('ENV','develop');

switch (ENV) 
{
	case 'develop':
				
		ini_set('display_errors', 1);
		
		break;
	
	case 'prodution':

		ini_set('display_errors', 0);

		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);

		break;
}		

/* Running */

define('ENGPATH', 'engine/');

define('APP', 'app/');

require ENGPATH.'Kernel.php'; 