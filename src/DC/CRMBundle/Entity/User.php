<?php

namespace DC\CRMBundle\Entity;

use DC\CRMBundle\Entity\Person;

class User extends person {
	
	protected $username;
	protected $password;

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}



}