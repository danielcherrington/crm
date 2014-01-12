<?php

namespace DC\CRMBundle\Entity;

use DC\CRMBundle\Entity\User;


abstract class Base
{
   
    protected $id;
    protected $name;
    protected $user;
    protected $dateEntered;
    protected $dateModified;

    public function getProperties()
    {   
        return get_object_vars($this);
    }

    public function getDateEntered()
    {
        return $this->dateEntered;
    }

    public function getDateModified()
    {
        return $this->dateModified;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Account
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

}
