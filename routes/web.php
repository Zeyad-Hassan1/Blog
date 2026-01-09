<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\usersController;


Route::get('/', function () {
    return view('blog.home');
});

Route::get('/post/{id}', function ($id) {
    return view('blog.single',compact('id'));
});

Route::get('/category/{id}/{name}', function ($id,$name) {
    return view('blog.category',compact('id','name'));
});

Route::middleware(['authMiddleware'])->group(function(){

    Route::get('/admin', function () {
        return view('admin.categories');
    });
    
    Route::post('/create_catagory',[categoriesController::class , 'create']);
    Route::get('/del_category/{id}',[categoriesController::class , 'del_category']);
    
    
    Route::get('/admin/posts', function () {
        return view('admin.posts');
    });
    
    Route::post('/create_post',[postsController::class , 'create']);
    Route::get('/del_post/{id}',[postsController::class , 'del_post']);
    
    Route::get('/admin/users', function () {
        return view('admin.users');
    });
    
    Route::post('/create_user',[usersController::class , 'create']);
    Route::get('/del_user/{id}',[usersController::class , 'del_user']);
    Route::get('/logout',[usersController::class , 'logout']);
    
    
});

Route::post('/login',[usersController::class , 'login']);
Route::get('/login', function () {
    return view('admin.login');
});
