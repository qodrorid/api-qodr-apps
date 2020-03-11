<?php

namespace App\Utils;

use Mockery\Undefined;

class ResponseFormat
{
    
    public static function error($statusCode, $message)
    {
        $format = [
            'metaData' => [
                'isError'    => true,
                'statusCode' => $statusCode,
                'message'    => $message,
            ],
            'result' => null
        ];
        return $format;
    }
    
    public static function success($data, $message = null, $paginate = null)
    {
        $format = [
            'metaData' => [
                'isError'    => false,
                'message'    => $message ?? 'Success!',
            ],
            'result' => $data
        ];

        if (!is_null($paginate)) $format['metaData']['paginate'] = $paginate; 

        return $format;
    }

}