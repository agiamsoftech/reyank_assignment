<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('get_state_by_countryid/{country?}', [HomeController::class, 'getStateByCountryid'])->name('get_state_by_countryid');
Route::get('get_state_by_stateid/{country?}', [HomeController::class, 'getCityByStateid'])->name('get_state_by_stateid');
Route::post('save_data', [HomeController::class, 'saveData'])->name('save_data');

Route::get('welcome1', [HomeController::class, 'welComeLogic'])->name('welcome1');
