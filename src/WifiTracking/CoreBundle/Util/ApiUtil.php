<?php
/**
 * Created by PhpStorm.
 * User: tri
 * Date: 2/10/15
 * Time: 8:29 PM
 */

namespace WifiTracking\CoreBundle\Util;


class ApiUtil {

    public static function checkApiKey($key){
        if($key === ConfigUtil::API_KEY){
            return true;
        }
        return false;
    }
} 