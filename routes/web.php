<?php


$router->get('/', function() {
    return response()->json('SERVICE_PUSTIKOM',200);
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});


// // PMB ROUTE START

$router->group(['prefix' => 'pmb'], function () use ($router) {
	$router->resource('calon-mahasiswa/biodata', 'pmb\BiodataController', ['except' => ['edit', 'create']]);
	$router->resource('token-pendaftaran', 'pmb\TokenController', ['except' => ['edit', 'create']]);
	$router->resource('calon-mahasiswa', 'pmb\CalonMahasiswaController', ['except' => ['edit', 'create']]);
});
// PMB ROUTE END
