<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function(){
    return 'Olá, Elton';
});

Route::get('/status-ok', function () {
    return response('OK', 200);
});

Route::get('/status-not-found', function () {
    abort(404);
});

Route::get('/successful', function () {
    return response('Success', 201);
});

Route::get('/redirect', function () {
    return redirect('/home');
});

Route::get('/forbidden', function () {
    abort(403);
});

Route::get('/unauthorized', function () {
    abort(401);
});

Route::get('/greeting', function () {
    return response('<h1>Welcome to Laravel</h1>', 200);
});

Route::get('/no-error', function () {
    return response('Everything is fine', 200);
});

Route::get('/headers', function () {
    return response('Headers test', 200)
        ->header('Content-Type', 'text/plain')
        ->header('Cache-Control', 'no-cache');
});

Route::get('/no-custom-header', function () {
    return response('No custom header', 200);
});

Route::get('/empty', function () {
    return response('', 204);
});






