<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function res($db_name, $result = null, $code){

        if($result !== null) {

            return response()->json([
                'service_name' => 'SERVICE PUSTIKOM',
                'database_name' => $db_name,
                'result' => $result
            ],$code);
        }

        return response()->json([
            'service_name' => 'SERVICE PUSTIKOM',
            'database_name' => $db_name,
            'result' => null
        ],$code);
    }

    public function res_error($db_name, $result, $code){
       
        return response()->json([
            'service_name' => 'SERVICE PUSTIKOM',
            'database_name' => $db_name,
            'result' => $result
        ],$code);
    }

  

   
}