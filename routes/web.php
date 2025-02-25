<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'mona';
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    // return view('about')-> with('name',$name);
    // return view('about', ['name' => $name]);
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});
// Tasks
Route::get('tasks', [TaskController::class, 'index']);

Route::post('create', [TaskController::class, 'create']);

Route::post('delete/{id}', [TaskController::class, 'destroy']);

Route::post('edit/{id}', [TaskController::class, 'edit']);

Route::post('update', [TaskController::class, 'update']);

// Users
Route::get('users', [UserController::class, 'index']);

Route::post('create', [UserController::class, 'create']);

Route::post('delete/{id}', [UserController::class, 'destroy']);

Route::post('edit/{id}', [UserController::class, 'edit']);

Route::post('update', [UserController::class, 'update']);

Route::get('app', function () {
    return view('layouts.app');
});
