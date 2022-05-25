<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SubUnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConvertController;

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

Route::get('/', [UnitController::class,'index']);
Route::resource('units', UnitController::class);
Route::get('fetchSubunits/{unit_id}', [UnitController::class,'fetchSubunit'])->name('fetchSubunit');
Route::get('createSubunit/{unit_id}', [UnitController::class,'createSubunit'])->name('units.createSubunit');
Route::post('storeSubunit/{unit_id}', [UnitController::class,'storeSubunit'])->name('units.storeSubunit');
Route::resource('subunits', SubUnitController::class);
Route::resource('products', ProductController::class);
Route::get('convertFunction', [ConvertController::class,'convertUnitView']);
Route::post('convertFunction', [ConvertController::class,'convertUnit'])->name('convertFunction');
Route::get('totalunits/{product_id}', [ConvertController::class,'totalUnits'])->name('totalunits');
Route::get('totalSubunits/{product_id}', [ConvertController::class,'totalSubunits'])->name('totalSubunits');
