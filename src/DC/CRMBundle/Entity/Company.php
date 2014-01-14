<?php

namespace DC\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DC\CRMBundle\Entity\Base;


class Company extends Base
{
    private $phoneOffice;
    private $website;
    private $description;
    private $industry;
    private $emailAddress;

    public function setPhoneOffice($phoneOffice)
    {
        $this->phoneOffice = $phoneOffice;

        return $this;
    }

    /**
     * Get phoneOffice
     *
     * @return string 
     */
    public function getPhoneOffice()
    {
        return $this->phoneOffice;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Account
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Account
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set industry
     *
     * @param array $industry
     * @return Account
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;

        return $this;
    }

    /**
     * Get industry
     *
     * @return array 
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return Account
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
}
