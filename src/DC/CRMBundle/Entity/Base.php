<?php

namespace DC\CRMBundle\Entity;

use DC\CRMBundle\Entity\User;


abstract class Base
{
    protected $id;
    protected $name;
    protected $user;
    protected $date_entered;
    protected $date_modified;

    public function getProperties()
    {   
        return get_object_vars($this);
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

    public function getDateModified()
    {
        return $this->date_modified;
    }

    public function setDateModified($dateModified)
    {
        $this->date_modified = $dateModified;
    }

    public function getDateEntered()
    {
        return $this->date_entered;
    }

    public function setDateEntered($dateEntered)
    {
        $this->date_entered= $dateEntered;
    }

    public function __toString()
    {
        return (string) $this->name;
    }

}
