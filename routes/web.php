<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Models\Post;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;

Route::get('/one-to-one-polymorphic', function (){
    User::factory()->count(1)->create();
    Post::find(1)->image()->create(['url'=> 'someImg.png']);
    User::first()->image()->create(['url'=> 'userImg.png']);
    return Image::find(1)->imageable;
});


Route::get('/one-to-many-polymorphic', function (){
//    Post::factory()->count(1)->create();
    Video::factory()->count(1)->create();
//    Post::first()->comments()->create(['comment'=> 'some comment']);
    Video::first()->comments()->create(['comment'=> 'VIDEO comment again !!!']);
});


Route::get('/many-to-many-polymorphic', function (){
//    Post::first()->tags()->create(['name' => 'laravel']);
//    Post::first()->tags()->create(['name' => 'react']);
//    Video::first()->tags()->create(['name' => 'VUE']);
//    Video::first()->tags()->attach(1);
    Post::first()->tags()->attach(1);

});
