<?php
namespace WifiTracking\WifiInfoBundle\Manager;

use Doctrine\ORM\EntityManager as EntityManager;
use WifiTracking\WifiInfoBundle\Entity\WifiInfo;

class WifiActionManager
{
    protected $objEm;
    protected $container;

    protected $objWifiManager;

    public function __construct(EntityManager $em, $container)
    {
        $this->objEm = $em;
        $this->objContainer = $container;
        $this->objWifiManager = $this->objEm->getRepository('WifiTrackingWifiInfoBundle:WifiInfo');
    }

    public function getDataById($id){
        return $this->objWifiManager->find($id);
    }

    public function getAllData(){
        return $this->objWifiManager->findAll();
    }

    public function createData($data){

        if(empty($data['longtitude'])){
            return "Longtitude is null";
        }
        if(empty($data['latitude'])){
            return "latitude is null";
        }
        if(empty($data['wifiName'])){
            return "wifi name is null";
        }
        $wifi = new WifiInfo();
        $wifi->setLongtitude($data['longtitude']);
        $wifi->setLatitude($data['latitude']);
        $wifi->setWifiName($data['wifiName']);
        $wifi->setWifiPass($data['wifiPass']);
        $wifi->setDescription($data['description']);
        $this->objEm->persist($wifi);
        $this->objEm->flush();
        $this->objEm->clear();
        return null;
    }

    /*--- END HELP FUNCTION ---*/
}