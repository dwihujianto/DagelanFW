<?php defined('ENGPATH') OR exit('Forbbiden');

/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
* @package Engine / Router
*/

$getUri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$controller = explode('/', $getUri);

if (isset($controller[2]) && strlen($controller[2]) > 0 )  
{
	$path = APP.'modules/'.Segment(2).'.php';

	if (file_exists($path)) 
	{
		require_once $path;
	}
	else
	{
		show_404();
	}	

}
else
{
	if (isset($default_page))
	{
		if (file_exists(APP.'modules/'.$default_page.'.php')) 
		{
			require_once APP.'modules/'.$default_page.'.php';
		}
		else
		{
			error_msg('Halaman pertama tidak ditemukan');
		}	
	}
	else
	{
		error_msg('Halaman pertama belum ditentukan');
	}		
}