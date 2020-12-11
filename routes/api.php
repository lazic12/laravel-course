<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::view('api/vue', [App\Http\Controllers\TestingVueController::class, 'index']);

//Route::get('/posts', function(){
//    $post = \App\Models\Post::create(['title'=>'my first post', 'content'=>'some content here']);
//    return $post;
//});

Route::resource('posts', \App\Http\Controllers\PostController::class);
