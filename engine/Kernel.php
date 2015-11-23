<?php defined('ENGPATH') OR exit('Forbbiden');

/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
* @package Engine / Kernel
*/

/* Load db */

require_once ENGPATH.'/Database.php';

/* Session */

if ($session===TRUE) 
{
	require_once ENGPATH.'/Session.php';	
}

/* Router */

require_once ENGPATH.'/Router.php';

/* Site Url */

function Segment($segmentvalue)
{
	$uri = $_SERVER['REQUEST_URI'];

	$segment = explode('/', $uri);

	switch ($segmentvalue) 
	{
		case '2':

			$res = isset($segment[$segmentvalue]) ? $segment[$segmentvalue] : 'base' ;

			break;

		case '3':
			
			$res = isset($segment[$segmentvalue]) ? $segment[$segmentvalue] : 'index' ;
			
			break;
		
		case '4':

			$res = isset($segment[$segmentvalue]) ? $segment[$segmentvalue] : '' ;

			break;

	}

	return $res;
}

function url($url)
{
	$basepath = $_SERVER['HTTP_HOST'];

	return 'http://'.$basepath.'/'.$url;	

}

function redirect($url)
{
	$rdr = url($url);

	return header('location:'.$rdr);
}


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