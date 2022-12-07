<?php

use App\Http\Controllers\VacineController;
use App\Http\Controllers\EmployeeController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/' , [VacineController::class, 'index'] )->name("vacina.index"); 
Route::get('/all_vacinas' , [VacineController::class, 'getAll'] )->name("vacina.getall");
Route::post('/save_vacinas' , [VacineController::class, 'store'] )->name("save.vacina");
Route::get('/get_vacina/{vacina}' , [VacineController::class, 'show'] )->name("show.vacina");
Route::put('/update_vacina' , [VacineController::class, 'update'] )->name("update.vacina"); 
Route::delete('/delete_vacina/{id}' , [VacineController::class, 'destroy'] )->name("delete.vacina");


Route::get('/funcionarios' , [EmployeeController::class, 'index'] )->name("funcionario.index");
Route::get('/all_funcionarios' , [EmployeeController::class, 'getAll'] )->name("funcionario.getall");
Route::post('/save_funcionarios' , [EmployeeController::class, 'store'] )->name("save.funcionario");
Route::get('/get_funcionario/{funcionario}' , [EmployeeController::class, 'show'] )->name("show.funcionario");
Route::put('/update_funcionario' , [EmployeeController::class, 'update'] )->name("update.funcionario");
Route::delete('/delete_funcionario/{id}' , [EmployeeController::class, 'destroy'] )->name("delete.funcionario");


