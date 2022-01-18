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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('menu');
   });
});





Auth::routes();
Route::group(['middleware' =>'auth'], function(){
Route::get('/children', [App\Http\Controllers\ChildrenController::class, 'index'])->name('children.index');
Route::get('/tasks-show/{id}',[App\Http\Controllers\ChildrenController::class, 'show'])->name('tasks.show');

Route::get('/parentpassword', function () {
    return view('parent.password');
})->name('parent.password');
Route::post('/parentlogin', [App\Http\Controllers\Auth\LoginParentController::class, 'dologin'])->name('parent.login');
Route::put('/tasks/{id}', [App\Http\Controllers\ChildrenController::class, 'finished'])->name('child-task.finished');
Route::put('/repeat/{id}', [App\Http\Controllers\TaskController::class, 'repeat'])->name('task.repeat');
//Route::put('/refresh/{id}', [App\Http\Controllers\TaskController::class, 'refresh'])->name('task.refresh');
Route::resource('item', 'App\Http\Controllers\ItemController');
Route::resource('child-task', 'App\Http\Controllers\ChildrenController');
Route::resource('child', 'App\Http\Controllers\ChildController');
Route::resource('task', 'App\Http\Controllers\TaskController');
Route::get('/task-edit/{id}/{type}',[App\Http\Controllers\TaskController::class, 'edit'])->name('taskk.edit');
Route::get('/task-refresh/{id}',[App\Http\Controllers\TaskController::class, 'refresh'])->name('task.refresh');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('menu');
Route::put('/child_task-update/{id}',[App\Http\Controllers\ChildrenController::class, 'update'])->name('task-image.update');
Route::put('/task-update/{id}/{type}',[App\Http\Controllers\TaskController::class, 'update'])->name('taskk.update');
Route::get('/child_task-edit/{id}',[App\Http\Controllers\ChildrenController::class, 'edit'])->name('task-image.edit');
Route::put('/task-refreshp/{id}',[App\Http\Controllers\TaskController::class, 'refreshp'])->name('task.refreshp');
Route::get('/event', function () {
    return view('event');
})->name('event.index');
Route::get('/children-events', function () {
    return view('children.events.event');
})->name('children-events');

Route::resource('events', 'App\Http\Controllers\EventsController',['only' => ['index', 'store', 'update', 'destroy']]);

});