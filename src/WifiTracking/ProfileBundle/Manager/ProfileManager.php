<?php
namespace WifiTracking\ProfileBundle\Manager;

use Doctrine\ORM\EntityManager as EntityManager;

class ProfileManager
{
    protected $objEm;
    protected $container;

    protected $objWifiManager;

    public function __construct(EntityManager $em, $container)
    {
        $this->objEm = $em;
        $this->objContainer = $container;
        $this->objWifiManager = $this->objEm->getRepository('ProfileBundle:Profile');
    }

    public function getDataById($id){
        return $this->objWifiManager->find($id);
    }

    public function getAllData(){
        return $this->objWifiManager->findAll();
    }

    public function checkLogin(){

    }

    /*--- END HELP FUNCTION ---*/
}