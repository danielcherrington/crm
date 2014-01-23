<?php

namespace DC\CRMBundle\Entity;

use DC\CRMBundle\Entity\Person;
use Symfony\Component\Security\Core\User\UserInterface;

class User extends person implements UserInterface, \Serializable {
	
	protected $username;
	protected $password;
	protected $is_admin;
	protected $roles = array();
	protected $settings;

	public function __construct()
	{
		$this->roles = array();
	}

	public function setSettings($settings)
	{
		$this->settings = serialize($settings);
	}

	public function getSettings()
	{
		return unserialize($this->settings);
	}

	public function IsAdmin()
	{
		return $this->is_admin;
	}

	public function setIsAdmin($is_admin)
	{
		$this->is_admin = $is_admin;
	}

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

	public function getRoles()
	{
		if($this->isAdmin()){
			$this->addRole('ROLE_ADMIN');
		}	

		$this->addRole('ROLE_USER');

		return $this->roles;
	}

	public function getSalt()
    {
        return null;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    public function eraseCredentials()
    {

    }

    public function addRole($role)
    {
        $role = strtoupper($role);

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }



}