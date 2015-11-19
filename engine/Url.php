<?php defined('ENGPATH') OR exit('Forbbiden');

/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
* @package Engine / Kernel
*/

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
