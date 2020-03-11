<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Utils\ResponseFormat;

class Controller extends BaseController
{

    protected function success($message = 'Success!', $data = null)
    {
        return response()->json([
            "status"  => true,
            "message" => $message,
            "data"    => $data
        ]);
    }

    protected function error($code = 500, $message = 'Error!')
    {
        return response()->json([
            "status"  => false,
            "message" => $message,
            "data"    => null
        ], $code);
    }

}
