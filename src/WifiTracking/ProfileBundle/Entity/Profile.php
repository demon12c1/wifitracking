<?php

namespace WifiTracking\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 */
class Profile
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $profileId;

    /**
     * @var string
     */
    private $profilePassword;

    /**
     * @var string
     */
    private $profileEmail;

    /**
     * @var integer
     */
    private $profileWifiQuantity;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $created;


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
     * Set profileId
     *
     * @param string $profileId
     * @return Profile
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;

        return $this;
    }

    /**
     * Get profileId
     *
     * @return string 
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * Set profilePassword
     *
     * @param string $profilePassword
     * @return Profile
     */
    public function setProfilePassword($profilePassword)
    {
        $this->profilePassword = $profilePassword;

        return $this;
    }

    /**
     * Get profilePassword
     *
     * @return string 
     */
    public function getProfilePassword()
    {
        return $this->profilePassword;
    }

    /**
     * Set profileEmail
     *
     * @param string $profileEmail
     * @return Profile
     */
    public function setProfileEmail($profileEmail)
    {
        $this->profileEmail = $profileEmail;

        return $this;
    }

    /**
     * Get profileEmail
     *
     * @return string 
     */
    public function getProfileEmail()
    {
        return $this->profileEmail;
    }

    /**
     * Set profileWifiQuantity
     *
     * @param integer $profileWifiQuantity
     * @return Profile
     */
    public function setProfileWifiQuantity($profileWifiQuantity)
    {
        $this->profileWifiQuantity = $profileWifiQuantity;

        return $this;
    }

    /**
     * Get profileWifiQuantity
     *
     * @return integer 
     */
    public function getProfileWifiQuantity()
    {
        return $this->profileWifiQuantity;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Profile
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Profile
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Profile
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
}
