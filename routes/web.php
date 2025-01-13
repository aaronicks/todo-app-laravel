<?php
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;



Route::get('login',[AuthManager::class, 'login'] )
    ->name('login');


Route::get('logout',[AuthManager::class, 'logout'] )
->name('logout');


Route::post('login',[AuthManager::class, 'loginPost'] )
    ->name('login.post');



Route::get('register',[AuthManager::class, 'register'] )
    ->name('register');

Route::post('register',[AuthManager::class, 'registerPost'] )
    ->name('register.post');


Route::middleware("auth")->group(function(){
    
    // route to get add task
    Route::get('/',[TaskManager::class, 'listTask'] )
        ->name('home');
    

    // route to get add task
    Route::get('task/add',[TaskManager::class, 'addTask'] )
        ->name('add.task');

    // route to get add Posttask
    Route::post('task/add',[TaskManager::class, 'addTaskPost'] )
        ->name('add.task.post');


    // route to update task and if null do not show
    Route::get('task/status/{id}',[TaskManager::class, 'updateTaskStatus'] )
        ->name('task.status.update');

    // route to delete task
    Route::get('task/delete/{id}',[TaskManager::class, 'deleteTask'] )
        ->name('task.delete');
}); 


