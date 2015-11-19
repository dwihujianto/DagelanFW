<?php defined('ENGPATH') OR exit('Forbbiden');

/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
* @package Engine / Kernel
*/

/* Load db */

require_once ENGPATH.'/Database.php';

/* Router */

require_once ENGPATH.'/Router.php';

/* Site Url */

require_once ENGPATH.'/Url.php';

/* View */

function View($param,$data=array())
{

	$path = str_replace('.', '/', $param);

	extract($data);

	$res =  APP.'view/'.$path.'.php';
	
	require_once $res;
}

/* Show 404 */

function show_404()
{
	require_once APP.'/view/error/404.php';
}

/* Error db */

function error_db($msg)
{
	exit(require_once APP.'/view/error/err_db.php');
}

/* Error log */

function error_msg($msg)
{
	exit(require_once APP.'/view/error/err_log.php');
}

/* Input */

function input($input)
{
	$parse = htmlentities(mysql_escape_string(strip_tags($_POST[$input])));
	
	return $parse;
}