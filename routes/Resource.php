<?php
 /**
     * Create a rest Resource route
     *
     * @param $path
     * @param $controller
     * @param $name
     * @param array $exclude
     */

    function Resource ($uri, $controller)
    {
        $this->get($uri, 'App\Http\Controllers\\'.$controller.'@index');
     
        $this->post($uri, 'App\Http\Controllers\\'.$controller.'@store');
        $this->get($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@show');

        $this->put($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@update');
        $this->patch($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@update');
        $this->delete($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@destroy');
       
        return $this;
    }