<?php

namespace WifiTracking\WifiInfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use WifiTracking\CoreBundle\Util\ResponseUtil;
use WifiTracking\CoreBundle\Util\ApiUtil;
use WifiTracking\WifiInfoBundle\Entity\WifiInfo;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * get wifi info
     */
    public function getAction()
    {
        $request = $this->getRequest();

        ///////Check Api key//////

        $checkApiKeyIsWrong = $this->checkApiKey($request);
        if(isset($checkApiKeyIsWrong) && !empty($checkApiKeyIsWrong)){
            return $checkApiKeyIsWrong;
        }
        //////////////////////////

        // Type is "all" or numberic
        $type = $request->request->get('type');

        $result = 1;
        $wifi_info = array();
        $wifi_manager = $this->get('wifi_manager');
        $message = "success";
        // get all wifi info
        if($type == "all"){
            $allWifi = $wifi_manager->getAllData();
            if(!isset($allWifi) || empty($allWifi)){
                $result = 0;
                $message = "There is no wifi data";
            }
            foreach($allWifi as $wifi){
                $wifi_info[] = array(
                    'id' => $wifi->getId(),
                    'longtitude' =>  $wifi->getLongtitude(),
                    'latitude' => $wifi->getLatitude(),
                    'wifiName' => $wifi->getWifiName(),
                    'wifiPass' => $wifi->getWifiPass(),
                    'description' => $wifi->getDescription(),
                );
            }
        }
        // get wifi by id
        else{
            $wifi = $wifi_manager->getDataById($type);
            if(!isset($wifi) || empty($wifi)){
                $result = 0;
                $message = "There is no wifi data";
            }
            $wifi_info = array(
                'id' => $wifi->getId(),
                'longtitude' =>  $wifi->getLongtitude(),
                'latitude' => $wifi->getLatitude(),
                'wifiName' => $wifi->getWifiName(),
                'wifiPass' => $wifi->getWifiPass(),
                'description' => $wifi->getDescription(),
            );

        }

        $resultData = array(
            'status' => $result,
            'wifi_info' => $wifi_info,
            'message' => $message,
        );

        if($result == 0){
            return ResponseUtil::json(ResponseUtil::FAILED,$resultData);
        }
        else{
            return ResponseUtil::json(ResponseUtil::SUCCESS,$resultData);
        }
    }

    /**
     * create wifi info
     */
    public function createWifiAction(){
        $request = $this->getRequest();
        ///////Check Api key//////
        $checkApiKeyIsWrong = $this->checkApiKey($request);
        if(isset($checkApiKeyIsWrong) && !empty($checkApiKeyIsWrong)){
            return $checkApiKeyIsWrong;
        }
        //////////////////////////
            $wifi_manager = $this->get('wifi_manager');


            $longtitude = $request->request->get('longtitude');
            $latitude = $request->request->get('latitude');
            $wifiName = $request->request->get('wifiName');
            $wifiPass = $request->request->get('wifiPass');
            $description = $request->request->get('description');

            $wifi_info = array(
                'longtitude' => $longtitude,
                'latitude' => $latitude,
                'wifiName' => $wifiName,
                'wifiPass' => $wifiPass,
                'description' => $description,
            );

            $result = $wifi_manager->createData($wifi_info);

            // result variable is a error message return from create data
            if($result){
                $status = 0;
                $message = $result;
                $resultData = array(
                    'status' => $status,
                    'message' => $message,
                );
                return ResponseUtil::json(ResponseUtil::FAILED,$resultData);
            }else{
                $status = 1;
                $message = "Create wifi successfully";
                $resultData = array(
                    'status' => $status,
                    'wifi_info' => $wifi_info,
                    'message' => $message,
                );
                return ResponseUtil::json(ResponseUtil::SUCCESS,$resultData);
            }
    }


    private function checkApiKey(Request $request){
        $message = "";
        $key = $request->request->get('API_KEY');
        if(isset($key) && !empty($key)){
            if(!ApiUtil::checkApiKey($key)){
                $status = 0;
                $message = "API key is wrong, please check!" ;
            }else{
                $status = 1;
            }
       }else{
            $status = 0;
            $message = "API key is required, please check!" ;
        }

        $resultData = array(
            'status' => $status,
            'message' => $message,
        );

        switch($status){
            case 0:
                return ResponseUtil::json(ResponseUtil::FAILED,$resultData);
                break;
            case 1:
                return null;
                break;
            default:
                return null;
                break;
        }


    }

}