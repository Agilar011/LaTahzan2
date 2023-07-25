<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtomotifController;
use App\Http\Controllers\PropertiController;

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


// CUSTOMER

Route::get('/', function () {
    return view('customer.landing');
});

Route::get('/login', function () {
    return view('customer.login');
});

Route::get('/register', function () {
    return view('customer.register');
});

Route::get('/otomotif', function () {
    return view('customer.feature.oto-page');
});

Route::get('/properti', function () {
    return view('customer.feature.prop-page');
});

Route::get('/umroh', function () {
    return view('customer.feature.umroh-page');
});

// ADMIN

Route::get('/login-admin', function () {
    return view('admin.login-admin');
});


Route::get('/dashboard', function () {
    return view('admin.main-dashboard-admin');
});

// INPUT ADMIN

Route::get('/input-umroh', function () {
    return view('admin.admin-category-page.umroh.input-umroh');
});

// Route::get('/input-properti', function () {
//     return view('admin.admin-category-page.prop.input-prop');
// });


//RETRIEVE DATA PROP ADMIN

Route::get('/input-properti',[PropertiController::class,'index'])->name('properti');

//TAMBAH DATA PROP ADMIN

Route::get('/tambahProp',[PropertiController::class,'tambahProp'])->name('tambahProp');
Route::post('/insertdataprop',[PropertiController::class,'insertdataprop'])->name('insertdataprop');




//RETRIEVE DATA OTO ADMIN

Route::get('/input-oto',[OtomotifController::class,'index'])->name('otomotif');


//TAMBAH DATA OTO ADMIN

Route::get('/tambahOto',[OtomotifController::class,'tambahOto'])->name('tambahOto');
Route::post('/insertdataoto',[OtomotifController::class,'insertdataoto'])->name('insertdataoto');

//UPDATE DATA OTO ADMIN

Route::get('/tampilkandataoto/{id}',[OtomotifController::class,'tampildataoto'])->name('tampilkandataoto');
Route::post('/updatedataoto/{id}',[OtomotifController::class,'updatedataoto'])->name('updatedataoto');

//DELETE DATA OTO ADMIN

Route::get('/deletedataoto/{id}',[OtomotifController::class,'deletedataoto'])->name('deletedataoto');







// CARDVIEW ADMIN

Route::get('/crd-umroh', function () {
    return view('admin.admin-category-page.umroh.crd-umroh');
});

Route::get('/crd-oto', function () {
    return view('admin.admin-category-page.oto.crd-oto');
});

Route::get('/crd-properti', function () {
    return view('admin/admin-category-page/prop/crd-prop');
});

// TRX ADMIN

Route::get('/trx-umroh', function () {
    return view('admin/admin-category-page/umroh/trx-umroh');
});

Route::get('/trx-oto', function () {
    return view('admin.admin-category-page.oto.trx-oto');
});

Route::get('/trx-properti', function () {
    return view('admin.admin-category-page.prop.trx-prop');
});

// REPORT ADMIN

Route::get('/report', function () {
    return view('admin.admin-category-page.report');
});

// CUSTOMER ADMIN

Route::get('/customer', function () {
    return view('admin.admin-category-page.customer.customer');
});
