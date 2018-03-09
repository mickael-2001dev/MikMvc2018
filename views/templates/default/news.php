<?php  

var_dump($data['news']);

if(isset($data['news'])) {
	foreach ($data['news'] as $row) {
		echo "<br>".$row->getTitle();
		echo "<br>".$row->getArticle();
	}
}