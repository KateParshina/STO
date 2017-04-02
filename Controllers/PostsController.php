<?php
include_once ROOT.'/Models/Posts.php';
//require_once (ROOT.'/Views/Posts/index.php');
/**
* 
*/
class PostsController
{

	public function actionIndex()
	{	
		$postsList = array();
		$postsList = Posts:: getPostsList();
		require_once (ROOT.'/Views/Posts/index.php');
		echo '<pre>';
		//print_r($postsList);
		echo '<pre>';

		return true;
	}
	public function actionView( $id )
	{
		if ($id)
		{	
			//require_once (ROOT.'/Views/Posts/index.php');
			$postItem = Posts::getPostItemById($id);

			echo '<pre>';
			print_r($postItem);
			echo '<pre>';
		}
   
		return true;
	}
	
}