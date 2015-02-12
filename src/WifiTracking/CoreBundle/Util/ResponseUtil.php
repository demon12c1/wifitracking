<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bachhuong
 * Date: 8/18/13
 * Time: 10:09 AM
 */

namespace WifiTracking\CoreBundle\Util;

use Symfony\Component\HttpFoundation\Response as Response;

class ResponseUtil {
    /**
     * Create a new JSONP response.
     *
     * <code>
     *		// Create a response instance with JSONP
     *		return ResponseUtil::jsonp('myFunctionCall', $data, 200, array('header' => 'value'));
     * </code>
     *
     * @param  mixed     $data
     * @param  int       $status
     * @param  array     $headers
     * @return Response
     */

    const SUCCESS = "SUCCESS";
    const FAILED = "FAILED";

    public static function jsonp($callback, $data, $status = 200, $headers = array())
    {
        $headers['Content-Type'] = 'application/json; charset=utf-8';

        return new Response($callback.'('.json_encode($data).');', $status, $headers);
    }

    public static function json($result, $data, $status = 200, $headers = array())
    {
        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $jsonResponse = array('result' => $result, 'data' => $data);
        return new Response(json_encode($jsonResponse), $status, $headers);
    }
}