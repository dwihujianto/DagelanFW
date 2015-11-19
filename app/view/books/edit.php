<?php defined('APP') OR exit('Forbbiden'); ?>
<pre>
	<form action="<?php echo url('index.php/sample/update') ?>" method="POST">
		<input type="hidden" name="_id" value="<?php echo $book['id'] ?>">
		Title : <input type="text" name="_title" value="<?php echo $book['title'] ?>">
		Year : <input type="text" name="_year" value="<?php echo $book['year'] ?>">
		Author : <input type="text" name="_author" value="<?php echo $book['author'] ?>">
		<input type="submit">
	</form>
</pre>