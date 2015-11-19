<?php defined('APP') OR exit('Forbbiden'); ?>
<a href="<?php echo url('index.php/sample/add') ?>">Add</a>
<table border="1">
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Year</th>
		<th>Author</th>
		<th>Action</th>
	</tr>
	<?php foreach ($books as $value): ?>
		<tr>
			<td><?php echo $value['id'] ?></td>
			<td><?php echo $value['title'] ?></td>
			<td><?php echo $value['year'] ?></td>
			<td><?php echo $value['author'] ?></td>
			<td>
				<a href="<?php echo url('index.php/sample/edit/'.$value['id']) ?>">Edit</a>
				<a href="<?php echo url('index.php/sample/'.$value['id'].'/delete') ?>">Delete</a>
			</td>
		</tr>
	<?php endforeach ?>

</table>