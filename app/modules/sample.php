<?php defined('APP') OR exit('Forbbiden');

switch (Segment(3)) {
	
	/* Index controller */

	case 'index':
		
		$data['books'] = $getResult('books');

		View('books.index',$data);	

		break;


	/* Add new data */
		
	case 'add':

		View('books.add');

		break;


	/* Store data */
		
	case 'store':
		
		$parse = [
			'title'		=> input('_title'),
			'year'		=> input('_year'),
			'author'	=> input('_author')
		];

		$rs = $saveData('books',$parse);

		if ($rs) 
		{
			redirect('index.php/sample');
		}

		break;


	/* Edit data */

	case 'edit':

		$id = Segment(4);

		$data['book'] = $findOrFail('books',['id'=>$id]);

		View('books.edit',$data);

		break;


	/* Process update data */
		
	case 'update':
		$id = input('_id');

		$parse = [
			'title'		=> input('_title'),
			'year'		=> input('_year'),
			'author'	=> input('_author')
		];

		$rs = $updateData('books',$parse,['id'=>$id]);

		if ($rs) 
		{
			redirect('index.php/sample');			
		}

		break;


	/* Delete data */
		
	default :
		
		$id = Segment(3);

		$rs = $delData('books',['id'=>$id]);

		if ($rs) 
		{
			redirect('index.php/sample');
		}

		break;	
}