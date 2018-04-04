<?php  

interface InterfaceModel
{
	public function getAll();
	public function getAllById($var);
	public function insert($var);
	public function update($var);
	public function delete($var);
}

