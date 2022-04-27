<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
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

Route::get('company',[CompanyController::class,'index']);

Route::post('createcompany',[CompanyController::class,'add']);

// Route::delete('deletecompany/{id}',[CompanyController::class,'delete']);

Route::get('deletecompany/{id}',[CompanyController::class,'delete']);


Route::get('editcompany/{id}',[CompanyController::class,'edit']);

Route::put('/updatecompany/{id}',[CompanyController::class,'update']);

Route::get('addstudent', function () {
    return view('create');
});