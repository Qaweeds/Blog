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

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog'], function () {
    $methods = array('index', 'edit', 'store', 'update', 'create');

    Route::resource('categories', 'CategoryController')->names('blog.admin.categories')->only($methods);
    Route::resource('posts', 'PostController')->names('blog.admin.posts')->except('show');


});
