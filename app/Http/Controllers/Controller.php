<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseData($data,$status)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], $status);
    }
    public function responseMessage($message)
    {
        return response()->json(['message' => $message]);
    }
}
