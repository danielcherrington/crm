<?php

namespace DC\CRMBundle\Entity;

use DC\CRMBundle\Entity\Company;
use Doctrine\Common\Collections\ArrayCollection;

class Account extends Company
{
    public $module = "Accounts";

    protected $contacts;

    public function __construct() 
    {
    	$this->contacts = new ArrayCollection();
    }

    public function getContacts()
    {
    	return $this->contacts;
    }

}