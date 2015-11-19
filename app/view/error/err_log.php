<?php defined('APP') OR exit('Forbbiden') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
	<style type="text/css">
	.error{
		border: 1px solid black;
		width: 60%;
		height: 60px;
		text-align: center;
		margin-top: 40px;
		background: #CBE8E3;
		vertical-align: center;

	}
	</style>
</head>
<body>
<center>
<div class="error">
	<h3>.:<?php echo $msg ?>:.</h3>	
</div>
</center>
</body>
</html>