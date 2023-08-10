<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\OtomotifController;
use App\Http\Controllers\UmrohController;



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

Route::get('/input-properti',[PropertiController::class,'index'])->name('property');

// etalase property

Route::get('/crd-properti',[PropertiController::class,'showApprovedAndNotPurchasedPropertys'])->name('etalase-prop');

// route approve property

Route::middleware('auth')->post('/Propertys/{property}/approve', [PropertiController::class, 'approve'])->name('propertys.approve');

// route Buyed property

Route::middleware('auth')->post('/Propertys/{property}/purchased', [PropertiController::class, 'purchase'])->name('propertys.purchased');

// route show purchased property

Route::get('/trx-properti',[PropertiController::class,'showPurchasedPropertys'])->name('transaksi-prop');

//TAMBAH DATA PROP ADMIN

Route::get('/tambahProp',[PropertiController::class,'tambahProp'])->name('tambahProp');
Route::post('/insertdataprop',[PropertiController::class,'insertdataprop'])->name('insertdataprop');

//UPDATE DATA PROP ADMIN

Route::get('/tampilkandataprop/{id}',[PropertiController::class,'tampilkandataprop'])->name('tampilkandataprop');
Route::post('/updatedataprop/{id}',[PropertiController::class,'updatedataprop'])->name('updatedataprop');

//DELETE DATA PROP ADMIN

Route::get('/deletedataprop/{id}',[PropertiController::class,'deletedataprop'])->name('deletedataprop');

// setting otomotif
// Input data otomotif

Route::get('/input-oto',[OtomotifController::class,'index'])->name('otomotif');

// etalase otomotif

Route::get('/crd-oto',[OtomotifController::class,'showApprovedNotPurchasedOtomotifs'])->name('etalase-oto');

// route approve otomotif

Route::middleware('auth')->post('/Otomotif/{otomotif}/approve', [OtomotifController::class, 'approve'])->name('otomotifs.approve');

// route Buyed otomotif

Route::middleware('auth')->post('/Otomotif/{otomotif}/purchased', [OtomotifController::class, 'purchase'])->name('otomotifs.purchased');

// route show purchased otomotif

Route::get('/trx-oto',[OtomotifController::class,'showPurchasedOtomotifs'])->name('transaksi-oto');

//TAMBAH DATA OTO ADMIN

Route::get('/tambahOto',[OtomotifController::class,'tambahOto'])->name('tambahOto');
Route::post('/insertdataoto',[OtomotifController::class,'insertdataoto'])->name('insertdataoto');

//UPDATE DATA OTO ADMIN

Route::get('/tampilkandataoto/{id}',[OtomotifController::class,'tampildataoto'])->name('tampilkandataoto');
Route::post('/updatedataoto/{id}',[OtomotifController::class,'updatedataoto'])->name('updatedataoto');

//DELETE DATA OTO ADMIN

Route::get('/deletedataoto/{id}',[OtomotifController::class,'deletedataoto'])->name('deletedataoto');

// setting Umrah
//RETRIEVE DATA UMROH ADMIN

Route::get('/input-umroh',[UmrohController::class,'index'])->name('umroh');


//TAMBAH DATA UMROH ADMIN

Route::get('/tambahUmroh',[UmrohController::class,'tambahUmroh'])->name('tambahUmroh');
Route::post('/insertdataumroh', [UmrohController::class, 'insertdataumroh'])->name('insertdataumroh');

// route approve umroh

Route::middleware('auth')->post('/umrohs/{id}/approve', [UmrohController::class, 'approve'])->name('umrohs.approve');

Route::middleware(['auth'])->group(function () {
    // ...
    Route::post('/umrohs/{umroh}/purchase', [UmrohController::class, 'purchase'])->name('umroh.purchase');
    Route::get('/umrohs/approved-not-purchased', [UmrohController::class, 'showApprovedNotPurchasedUmrohs'])->name('umroh.showApprovedNotPurchasedUmrohs');
    // ...
});


Route::middleware(['auth'])->group(function () {
    // ...
    Route::get('/umrohs/{umroh}/purchase', [UmrohController::class, 'showPurchaseConfirmation'])->name('umroh.confirmation');
    Route::post('/umrohs/{umroh}/purchase', [UmrohController::class, 'purchase'])->name('umrohs.purchase');
    // ...
});


// etalase Umroh

Route::get('/crd-umroh',[UmrohController::class,'showApprovedNotPurchasedUmrohs'])->name('etalase-umroh');

// route show purchased Umroh
Route::get('/tampilkandatabeliumroh/{id}',[UmrohController::class,'tampilkandatabeliumroh'])->name('konfirmasi-umroh');
// dipake

Route::get('/tampilkandataumroh/{id}',[UmrohController::class,'tampilkandataumroh'])->name('tampilkandataumroh');

Route::post('/updatedataumroh/{id}',[UmrohController::class,'updatedataumroh'])->name('updatedataumroh');

// Route::get('/tampilkandatabeli/{id}',[UmrohController::class,'tampilkandatabeliumroh'])->name('beliumroh');
Route::group(['middleware' => 'auth'], function () {
    // ... other routes ...

    Route::post('updatedatabeliumroh/{id}', [UmrohController::class, 'updatedatabeliumroh'])->name('updatedatabeliumroh');
    Route::get('insertjemaah/{id}', [UmrohController::class, 'createjemaah'])->name('identitasjemaah');
    Route::post('insertjemaah/{id}', [UmrohController::class, 'storejemaah'])->name('storejemaah');

    // ... other routes ...
});

