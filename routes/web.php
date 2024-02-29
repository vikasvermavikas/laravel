<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomuserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::post('/users/adduser', [CustomuserController::class, 'adduser']);
Route::get('/users/getusers', [CustomuserController::class, 'getusers']);  
Route::get('/users/updateuser/{id}', [CustomuserController::class, 'getuserdata']);  
Route::post('/users/updateuser/{id}', [CustomuserController::class, 'updateuser']);
Route::delete('/users/deleteuser/{id}', [CustomuserController::class, 'deleteuser']);

// This route must be executed in last.
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

