<?php defined('ENGPATH') OR exit('Forbbiden');

/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
* @package Engine / Database
*/

require_once APP.'config.php';

extract($Config);

$conDB = mysqli_connect($host,$user,$pass,$db);

if (!$conDB)
{
	error_db('Database tidak terhubung');
	exit();
}

require_once ENGPATH.'/Query.php';