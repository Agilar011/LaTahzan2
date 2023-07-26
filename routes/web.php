<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtomotifController;


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

// setting Ototmotif
// Input data otomotif
Route::get('/input-oto',[OtomotifController::class,'index'])->name('otomotif');
// etalase otomotif
Route::get('/crd-oto',[OtomotifController::class,'showApprovedAndNotPurchasedOtomotifs'])->name('etalase-oto');
// route approve otomotif
Route::middleware('auth')->post('/otomotifs/{otomotif}/approve', [OtomotifController::class, 'approve'])->name('otomotifs.approve');

