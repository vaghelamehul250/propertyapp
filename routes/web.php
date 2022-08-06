<?php
use App\Http\Controllers\PropertyController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PropertyController::class, 'index'])->name("property_list");
Route::get('/property_add', [PropertyController::class, 'addProperty'])->name("property_create");
Route::post('/property_add', [PropertyController::class, 'storeProperty'])->name("property_store");
