<?php

namespace DC\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DC\CRMBundle\Entity\Base;


class Person extends Base
{
   protected $first_name;
   protected $last_name;

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }
    /**
     * Set firstName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }
}
