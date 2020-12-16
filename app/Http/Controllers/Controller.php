<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @param $status
     * @param $code
     * @param $data
     * @param $message
     * @return Response
     */
    protected function responseJSEND($status, $code, $data = null, $message = null)
    {
        $response = [
            'status' => $status,
        ];
        $data ? $response['data'] = $data : null;
        $message ? $response['message'] = $message : null;

        return response()->json(
            $response,
            $code
        );
    }
}
