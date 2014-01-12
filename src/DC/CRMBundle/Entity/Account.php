<?php

namespace DC\CRMBundle\Entity;

use DC\CRMBundle\Entity\Company;
use Doctrine\Common\Collections\ArrayCollection;

class Account extends Company
{
    protected $contacts;

    public function __construct() 
    {
    	$this->contacts = new ArrayCollection();
    }

    public function getContacts()
    {
    	return $this->contacts;
    }

    public function __toString()
	{
    	return (string) $this->name;
	}
  
}