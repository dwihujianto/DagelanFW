<?php defined('ENGPATH') OR exit('Forbbiden');

/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
* @package Database / Active Record
*/

/* Gel all data */

$getResult = function($table,$select = '*') use ($conDB){
	
	$query = "SELECT ".$select." FROM ".$table;

	$result = mysqli_query($conDB,$query);

	while($all = mysqli_fetch_assoc($result))
	{
		$data[] = $all; 
	}

	return $data;

};

/* Save data */

$saveData = function($table,$value=array()) use ($conDB){

	$fields = NULL;
	$values = NULL;

	foreach ($value as $k => $v) {
			
		$fields .= $k.",";

		$values .= "'".$v."'".",";					

	}

	$query = "INSERT INTO ".$table." (".rtrim($fields,",").") VALUES (".rtrim($values,",").")";

	$result = mysqli_query($conDB,$query);

	if ($result) 
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}	
};

/* Delete ata*/

$delData = function ($table,$param=array()) use ($conDB){

	foreach ($param as $key => $value) 
	{
		$query = "DELETE FROM ".$table." WHERE ".$key." = ".$value;	
	}

	$result = mysqli_query($conDB,$query);

	if ($result) 
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}	
	
};

/* Find or fail*/

$findOrFail = function ($table,$param=array(),$select='*') use ($conDB){

	foreach ($param as $key => $value) {
		
		$query = "SELECT ".$select." FROM ".$table." WHERE ".$key." = ".$value;

	}

	$result = mysqli_query($conDB,$query);

	if ($result) 
	{
		$resultRow = mysqli_num_rows($result);

		if ($resultRow==1) 
		{
		 	$getRow = mysqli_fetch_assoc($result);

		 	return $getRow;
		}
		else
		{
			error_db('Data tidak ditemukan');
		}	
	}
	else
	{
		error_db('Data tidak ditemukan');
	}	

};

/* Update data */

$updateData = function ($table,$data=array(),$param=array()) use ($conDB){

	$getData = NULL;

	foreach ($data as $field => $value) {
		
		$getData .= $field." = '".$value."',";

	}

	$data = rtrim($getData,",");

	foreach ($param as $key => $value) {
		
		$query = "UPDATE ".$table." SET ".$data." WHERE ".$key." = ".$value;	

	}

	$result = mysqli_query($conDB,$query);

	if ($result) 
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}	

};