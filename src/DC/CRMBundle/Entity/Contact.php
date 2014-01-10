<?php

namespace DC\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DC\CRMBundle\Entity\Person;

/**
 * Contact
 */
class Contact extends Person
{
    protected $account;

    /**
     * Set account
     *
     * @param \DC\CRMBundle\Entity\Account $account
     * @return Contact
     */
    public function setAccount(\DC\CRMBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \DC\CRMBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
}
