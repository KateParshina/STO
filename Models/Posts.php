<?php
/**
* 
*/
class Posts 
{
	/**
	* возвращает посто по id 
	*/
	public static function getPostItemById($id)
	{
		$id = intval($id);

		if ($id)
		{ 
			try 
			{ 
				$db = Db::getConnection(); 
			} 
			catch (PDOException $e) 
			{ 
				print "Error!: " . $e->getMessage() . "<br/>"; 
				die(); 
			} 
			$select = $db->query("SELECT * FROM posts WHERE post_id =".$id); 
			$postItem = $select->fetchAll(PDO::FETCH_ASSOC);  
		}
		return $postItem;
		//запрос в БД
	}



	/**
	* возвращает масив списка постов 
	*/
	public static function getPostsList() 
		{  
		try 
			{ 
				$db = Db::getConnection();
			} 
		catch (PDOException $e) 
			{ 
			print "Error!: " . $e->getMessage() . "<br/>";  
			} 
		$select = $db->query("SELECT * FROM posts"); 
		$postsList = $select->fetchAll(PDO::FETCH_ASSOC); 
		return $postsList; 
		}

}