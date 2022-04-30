<?php

use App\Http\Controllers\TaskController;
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
// display tasks view
Route::get('/', [TaskController::class, 'index']);
// insert row
Route::post('/store', [TaskController::class, 'store']);
// delete row => use method delete
Route::delete('delete/{id}', [TaskController::class, 'delete']);
// update name
Route::post('edit/{id}', [TaskController::class, 'edit']);
Route::put('update/{id}', [TaskController::class, 'update']);
