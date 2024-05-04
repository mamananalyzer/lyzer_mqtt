<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MqttController;

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

Route::get('/mqtt/{inverterNumber}', [MqttController::class, 'filterByInverter']);
Route::resource('/mqtt', MqttController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::get('/chart-data', [MqttController::class, 'getData']);


Route::get('/csrf-token', function() {
    return response()->json(['csrf_token' => csrf_token()]);
});

 