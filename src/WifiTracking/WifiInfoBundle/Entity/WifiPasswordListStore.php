<?php

namespace WifiTracking\WifiInfoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WifiInfo
 */
class WifiPasswordListStore
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \WifiTracking\WifiInfoBundle\Entity\WifiInfo
     */
    private $wifi;


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
     * Set wifi
     *
     * @param \WifiTracking\WifiInfoBundle\Entity\WifiInfo $wifi
     * @return WifiPasswordListStore
     */
    public function setWifi(\WifiTracking\WifiInfoBundle\Entity\WifiInfo $wifi = null)
    {
        $this->wifi = $wifi;

        return $this;
    }

    /**
     * Get wifi
     *
     * @return \WifiTracking\WifiInfoBundle\Entity\WifiInfo 
     */
    public function getWifi()
    {
        return $this->wifi;
    }
    /**
     * @var string
     */
    private $wifiName;

    /**
     * @var string
     */
    private $wifiPass;


    /**
     * Set wifiName
     *
     * @param string $wifiName
     * @return WifiPasswordListStore
     */
    public function setWifiName($wifiName)
    {
        $this->wifiName = $wifiName;

        return $this;
    }

    /**
     * Get wifiName
     *
     * @return string 
     */
    public function getWifiName()
    {
        return $this->wifiName;
    }

    /**
     * Set wifiPass
     *
     * @param string $wifiPass
     * @return WifiPasswordListStore
     */
    public function setWifiPass($wifiPass)
    {
        $this->wifiPass = $wifiPass;

        return $this;
    }

    /**
     * Get wifiPass
     *
     * @return string 
     */
    public function getWifiPass()
    {
        return $this->wifiPass;
    }
}
