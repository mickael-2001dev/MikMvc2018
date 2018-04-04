<?php  

<<<<<<< HEAD:models/NewsModel.php

class NewsModel extends Model implements InterfaceModel
=======
class News extends Model implements InterfaceModel
>>>>>>> b442fadf14c1f68df181f2de4ba066859a8429a3:models/News.php
{
	
	public function getAll()
	{
		$news = [];
<<<<<<< HEAD:models/NewsModel.php
		$results = parent::getAll('news');
		//var_dump($results);
=======
		parent::getAll('news');
		
>>>>>>> b442fadf14c1f68df181f2de4ba066859a8429a3:models/News.php
		foreach ($results as $row) {
			$news[] = new NewsAbstract(
				$row['title'],
				$row['article'],
				$row['id']
			);
		}

		return $news;

	}

	public function getAllById($id) 
	{
		parent::getAllById('news', $id);
		
		$news = new NewsAbstract(
			$results['title'],
			$results['article'],
			$results['id']
		);

		return $news;
	}

	public function delete($id)
	{
		$result = parent::delete('news', $id);

		return $result;
	}

	public function insert($var) 
	{
		echo "Insere";
	}

	public function update($var) 
	{
		echo "Atualiza";
	}
}
