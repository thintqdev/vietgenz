<?php

namespace App\Traits;

trait ApiResponse{

    // Trait Api Success
    protected function apiSuccess($data, $message = null, $code = 200){
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message
        ]);
    }

    // Trait Api Error
    protected function apiError($message = null, $code){
        return response()->json([
            'status' => false,
            'message' => $message
        ]);
    }
}
