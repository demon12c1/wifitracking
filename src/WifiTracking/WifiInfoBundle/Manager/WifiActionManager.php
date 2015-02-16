<?php
namespace WifiTracking\WifiInfoBundle\Manager;

use Doctrine\ORM\EntityManager as EntityManager;
use Doctrine\ORM\QueryBuilder;
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
        $clientIp = $this->get_client_ipaddress();
        if(isset($clientIp) && !empty($clientIp)){
            $checkIp =  $this->isWifiIpUsed($this->get_client_ipaddress());
        }
        if(isset($checkIp) && !empty($checkIp)){
            return "This wifi address has already posted";
        }

        $wifi = new WifiInfo();
        $wifi->setLongtitude($data['longtitude']);
        $wifi->setLatitude($data['latitude']);
        $wifi->setWifiName($data['wifiName']);
        $wifi->setWifiPass($data['wifiPass']);
        $wifi->setDescription($data['description']);
        $wifi->setExternalIpWifi($this->get_client_ipaddress());
        $this->objEm->persist($wifi);
        $this->objEm->flush();
        $this->objEm->clear();
        return $wifi;
    }

    function get_client_ipaddress() {
        $ip_address = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ip_address = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ip_address = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ip_address = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ip_address = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ip_address = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ip_address = getenv('REMOTE_ADDR');
        else
            $ip_address = 'UNKNOWN';

        return $ip_address;
    }

    function isWifiIpUsed($ip){
        $query = new QueryBuilder($this->objEm);
        $result = array();
        $query->select('w')
            ->from('WifiTrackingWifiInfoBundle:WifiInfo','w')
            ->where('w.external_ip_wifi = :ip')
            ->setParameter('ip',$ip);

        $result = $query->getQuery()->getResult();

        return $result;
    }

    /*--- END HELP FUNCTION ---*/
}