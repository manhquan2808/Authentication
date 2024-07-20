<?php

namespace App\Trait;

trait HttpResponses
{
    protected function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Successful',
            'message' => $message,
            'data' => $data,
        ]);
    }

    protected function error($data, $message = null, $code)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data,
        ]);
    }
}
