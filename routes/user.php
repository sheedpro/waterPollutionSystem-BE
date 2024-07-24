<?php

use GuzzleHttp\Psr7\Response;
use  Illuminate\Support\Facades\Route;
Route::get('/health', function (Response $response) {
    return  $response->getBody()->write('Hello World');
});