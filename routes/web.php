<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return view('Template UI.admin.dasboard-admin');
        } else {
            return view('template UI.customer.dasboard-customer');
        }
    })->name('dashboard');

});
// setting property
// Input data property
Route::get('/input-properti',[PropertyController::class,'index'])->name('property');
// etalase otomotif
Route::get('/crd-properti',[PropertyController::class,'showApprovedAndNotPurchasedPropertys'])->name('etalase-prop');
// route approve otomotif
Route::middleware('auth')->post('/Propertys/{property}/approve', [PropertyController::class, 'approve'])->name('propertys.approve');
