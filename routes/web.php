<?php

use App\Http\Requests\TaskRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
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
    return response('Welcome <br>to<br> Laravel', 200);
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

Route::get('/clients', function(){
    return view('clients', [
        'clients' => [],
        'extra_info' => 'Informações adicionais'
    ]);
});

Route::get('/users', function(){
    $users = User::paginate(5);

    return view('clients.index', [
        'users' => $users
    ]);
});

Route::post('/users', function(Request $request) {
    User::create($request->all());
});

Route::delete('/users/{user}', function(User $user) {
    $user->delete();
});

Route::post('/tasks', function(TaskRequest $request) {
    //vou cadastrar

    return $request->tarefa;
});

Route::get('/protegida', function() {
    return ['Rota acessada com sucesso'];
})->middleware('auth');

Route::post('/cart', function(Request $request) {
    $item = $request->only(['id', 'qtd']);

    Session::push('cart_items', $item);

    return 'item adicionado com sucesso';
});

Route::get('/products', function(){
    $products = Cache::get('products', []);

    return $products;
});

Route::post('/products', function(Request $request) {
    $product = $request->only(['id', 'name']);

    Cache::put('product', $product);

    return 'produto adicionado ao cache';
});