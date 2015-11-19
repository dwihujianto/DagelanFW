<?php defined('APP') OR exit('Forbbiden'); ?>
<pre>
	<form action="<?php echo url('index.php/sample/store') ?>" method="POST">
		Title : <input type="text" name="_title">
		Year : <input type="text" name="_year">
		Author : <input type="text" name="_author">
		<input type="submit">
	</form>
</pre>