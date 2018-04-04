<?php  


class NewsModel extends Model implements InterfaceModel
{
	
	public function getAll()
	{
		$news = [];
		$results = parent::getAll('news');
		//var_dump($results);
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
			$row['title'],
			$row['article'],
			$row['id']
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