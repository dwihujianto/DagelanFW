<?php defined('ENGPATH') OR exit('Forbbiden');

/**
* @author Dwi Hujianto <hujianto@github.com>
* @package Engine / Session 
*/


function setSessData($data,$value=NULL)
{
	session_start();

	if (is_array($data)) 
	{
		foreach ($data as $key => $value) 
		{
			$_SESSION[$key] = $value;
		}
	}
	else
	{
		$_SESSION[$data] = $value;
	}	

}

function sessData($key)
{
	session_start();

	return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
}

function flash($key,$value)
{
	session_start();

	$_SESSION['flash']['expired'] = time();

	$_SESSION['flash'][$key] = $value;

}

function flash_msg($key)
{
	session_start();

	if (isset($_SESSION['flash'])) 
	{
		if (time() - $_SESSION['flash']['expired'] < 5) 
		{
			
			return $_SESSION['flash'][$key];

		}
		else
		{
			unset($_SESSION['flash']);
		}
	}
	else
	{
		return null;
	}	

	
}

/* Handle user */

function is_admin()
{
	if (sessData('logged') != TRUE) 
	{
		show_404();
		exit();
	}
}