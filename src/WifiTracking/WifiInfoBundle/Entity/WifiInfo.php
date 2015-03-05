<?php

namespace WifiTracking\WifiInfoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WifiInfo
 */
class WifiInfo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $longtitude;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $wifiName;

    /**
     * @var string
     */
    private $wifiPass;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $external_ip_wifi;

    /**
     * @var string
     */
    private $bssid_wifi;

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
     * Set longtitude
     *
     * @param string $longtitude
     * @return WifiInfo
     */
    public function setLongtitude($longtitude)
    {
        $this->longtitude = $longtitude;

        return $this;
    }

    /**
     * Get longtitude
     *
     * @return string 
     */
    public function getLongtitude()
    {
        return $this->longtitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return WifiInfo
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set wifiName
     *
     * @param string $wifiName
     * @return WifiInfo
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
     * @return WifiInfo
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

    /**
     * Set description
     *
     * @param string $description
     * @return WifiInfo
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
     * Set external_ip_wifi
     *
     * @param string $externalIpWifi
     * @return WifiInfo
     */
    public function setExternalIpWifi($externalIpWifi)
    {
        $this->external_ip_wifi = $externalIpWifi;

        return $this;
    }

    /**
     * Get external_ip_wifi
     *
     * @return string 
     */
    public function getExternalIpWifi()
    {
        return $this->external_ip_wifi;
    }

    /**
     * Set bssid_wifi
     *
     * @param string $bssidWifi
     * @return WifiInfo
     */
    public function setBssidWifi($bssidWifi)
    {
        $this->bssid_wifi = $bssidWifi;

        return $this;
    }

    /**
     * Get bssid_wifi
     *
     * @return string
     */
    public function getBssidWifi()
    {
        return $this->bssid_wifi;
    }
}
