<?php

namespace DC\CRMBundle\Entity;

use DC\CRMBundle\Entity\Company;


class Account extends Company
{
    protected $contacts;

    public function __construct() 
    {
    	$this->contacts = new ArrayCollection();
    }

    public function __toString()
	{
    	return $this->name;
	}
  
}