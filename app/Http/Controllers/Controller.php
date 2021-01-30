<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{



    public function res($db_name, $result = null){

        if($result !== null) {

            return response()->json([
                'service_name' => 'SERVICE PUSTIKOM',
                'code' => 200,
                'database_name' => $db_name,
                'result' => $result
            ]);
        }

        return response()->json([
            'service_name' => 'SERVICE PUSTIKOM',
            'code' => 404,
            'database_name' => $db_name,
            'result' => null
        ]);
    }

    public function res_error($db_name, $result){
       
        return response()->json([
            'service_name' => 'SERVICE PUSTIKOM',
            'code' => 301,
            'database_name' => $db_name,
            'result' => $result
        ]);
    }

  

   
}