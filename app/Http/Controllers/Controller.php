<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function responseOK($data = null){
    	return response() -> json ([
        	'status' => 200,
        	'data' => $data
    	]);
    }

    protected function responseError($status, $message = null, $error = null){
    	return response() -> json ([
    		'status' => $status,
        	'message' => $message,
        	'error' => $error,
        ], $status);
    
    }
}
