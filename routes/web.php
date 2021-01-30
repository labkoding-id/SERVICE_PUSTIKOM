<?php


// PMB ROUTE START
$router->group(['prefix' => 'pmb'], function () use ($router) {

    $router->group(['prefix' => 'biodata'], function () use ($router) {
        $router->get('all/{limit}', 'pmb\BiodataController@all');
        $router->post('store', 'pmb\BiodataController@store');
        $router->get('{id}/show', 'pmb\BiodataController@show');
        $router->patch('{id}/update', 'pmb\BiodataController@update');
        $router->delete('{id}/delete', 'pmb\BiodataController@delete');
    });

    $router->group(['prefix' => 'token'], function () use ($router) {
        $router->get('all/{limit}', 'pmb\TokenController@all');
        $router->post('store', 'pmb\TokenController@store');
        $router->get('{id}/show', 'pmb\TokenController@show');
        $router->patch('{id}/update', 'pmb\TokenController@update');
        $router->delete('{id}/delete', 'pmb\TokenController@delete');
    });

    $router->group(['prefix' => 'maba'], function () use ($router) {
        $router->get('all/{limit}', 'pmb\CalonMahasiswaController@all');
        $router->post('store', 'pmb\CalonMahasiswaController@store');
        $router->get('{id}/show', 'pmb\CalonMahasiswaController@show');
        $router->patch('{id}/update', 'pmb\CalonMahasiswaController@update');
        $router->delete('{id}/delete', 'pmb\CalonMahasiswaController@delete');
    });
});



// PMB ROUTE END
