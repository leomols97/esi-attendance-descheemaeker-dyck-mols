<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentCtrl;

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

Route::get('/student', [StudentCtrl::class, 'home']);
Route::post('/student/add', [StudentCtrl::class, 'addStudent']);
Route::post('/student/delete', [StudentCtrl::class, 'deleteStudent']);
