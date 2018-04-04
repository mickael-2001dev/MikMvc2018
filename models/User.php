<?php  

class User 
{

	private $id;
	private $username;
	private $password;
	private $email;
	private $deleted;
	private $dtupdate;
	private $tempPassword;

	public function __construct($username, $password, $email = null, $deleted = 0, $dtupdate = null, $tempPassword = null, $id = null) 
	{
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->deleted = $deleted;
		$this->dtupdate = $dtupdate;
		$this->tempPassword =  $tempPassword;
	}

	public function getId() 
	{
		return $this->id;
	}

	public function getUsername() 
	{
		return $this->username;
	}

	public function getPassword() 
	{
		return $this->password;
	}

	public function getEmail() 
	{
		return $this->email;
	}

	public function getDeleted() 
	{
		return $this->deleted;
	}

	public function getDtupdate() 
	{
		return $this->dtupdate;
	}
	
	public function getTempPassword() 
	{
		return $this->tempPassword;
	}
}