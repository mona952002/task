<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

//Route::get('tasks', function () {
//   $tasks = DB::table('tasks')->get();
//  return view('tasks', compact('tasks'));
//});

Route::get('tasks', [TaskController::class, 'index']);

//Route::post('create', function () {
//   $task_name = $_POST['name'];
//   DB::table('tasks')->insert(['name' => $task_name]);
//  return redirect()->back();
//});

Route::post('create', [TaskController::class, 'create']);

//Route::post('delete/{id}', function ($id) {
//   DB::table('tasks')->where('id', $id)->delete();
//   return redirect()->back();
//});

Route::post('delete/{id}', [TaskController::class, 'destroy']);

//Route::post('edit/{id}', function ($id) {
//   $task = DB::table('tasks')->where('id', $id)->first();
//   $tasks = DB::table('tasks')->get();
//  return view('tasks', compact('task', 'tasks'));
//});

Route::post('edit/{id}', [TaskController::class, 'edit']);

//Route::post('update', function () {
 //   $id = $_POST['id'];
 //   DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']]);
 //   return redirect('tasks');
//});

Route::post('update', [TaskController::class, 'update']);
