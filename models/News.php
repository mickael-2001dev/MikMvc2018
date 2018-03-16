<?php  
namespace models;
use models\InterfaceModel;
use \NewsAbstract;

class News extends Model implements InterfaceModel
{
	
	public function getAll()
	{
		$news = [];
		parent::getAll('news');
		
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
