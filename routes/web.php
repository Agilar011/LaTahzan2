<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\OtomotifController;
use App\Http\Controllers\UmrohController;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return view('Template UI.admin.dasboard-admin');
        } else {
            return redirect()->route('landing');
        }
    })->name('dashboard');
});

// Routes for Properti
Route::middleware('auth')->group(function () {
    Route::get('/input-properti', [PropertiController::class, 'index'])->name('property');
    Route::get('/crd-properti', [PropertiController::class, 'showApprovedAndNotPurchasedPropertys'])->name('etalase-prop');
    Route::post('/Propertys/{property}/approve', [PropertiController::class, 'approve'])->name('propertys.approve');
    Route::post('/Propertys/{property}/purchased', [PropertiController::class, 'purchase'])->name('propertys.purchased');
    Route::get('/trx-properti', [PropertiController::class, 'showPurchasedPropertys'])->name('transaksi-prop');
    Route::get('/tambahProp', [PropertiController::class, 'tambahProp'])->name('tambahProp');
    Route::post('/insertdataprop', [PropertiController::class, 'insertdataprop'])->name('insertdataprop');
    Route::get('/tampilkandataprop/{id}', [PropertiController::class, 'tampilkandataprop'])->name('tampilkandataprop');
    Route::post('/updatedataprop/{id}', [PropertiController::class, 'updatedataprop'])->name('updatedataprop');
    Route::get('/deletedataprop/{id}', [PropertiController::class, 'deletedataprop'])->name('deletedataprop');
});

// Routes for Otomotif
Route::middleware('auth')->group(function () {
    Route::get('/input-oto', [OtomotifController::class, 'index'])->name('otomotif');
    Route::get('/crd-oto', [OtomotifController::class, 'showApprovedNotPurchasedOtomotifs'])->name('etalase-oto');
    Route::post('/Otomotif/{otomotif}/approve', [OtomotifController::class, 'approve'])->name('otomotifs.approve');
    Route::post('/Otomotif/{otomotif}/purchased', [OtomotifController::class, 'purchase'])->name('otomotifs.purchased');
    Route::get('/trx-oto', [OtomotifController::class, 'showPurchasedOtomotifs'])->name('transaksi-oto');
    Route::get('/tambahOto', [OtomotifController::class, 'tambahOto'])->name('tambahOto');
    Route::post('/insertdataoto', [OtomotifController::class, 'insertdataoto'])->name('insertdataoto');
    Route::get('/tampilkandataoto/{id}', [OtomotifController::class, 'tampildataoto'])->name('tampilkandataoto');
    Route::post('/updatedataoto/{id}', [OtomotifController::class, 'updatedataoto'])->name('updatedataoto');
    Route::get('/deletedataoto/{id}', [OtomotifController::class, 'deletedataoto'])->name('deletedataoto');
    Route::post('/otomotif/{id}/approvepayment', [OtomotifController::class, 'approved_payment'])->name('otomotif.approvepayment');
});

// Routes for Umroh
Route::middleware(['auth'])->group(function () {
    Route::get('/input-umroh', [UmrohController::class, 'index'])->name('umroh');
    Route::get('/tambahUmroh', [UmrohController::class, 'tambahUmroh'])->name('tambahUmroh');
    Route::post('/insertdataumroh', [UmrohController::class, 'insertdataumroh'])->name('insertdataumroh');
    Route::post('/umrohs/{id}/approve', [UmrohController::class, 'approve'])->name('umrohs.approve');
    Route::get('/tampilkandetailumroh/{id}', [UmrohController::class, 'tampilkandetailumroh'])->name('tampilkandetailumroh');
    Route::post('/umrohs/{umroh}/purchase', [UmrohController::class, 'showPurchaseConfirmation'])->name('umroh.confirmation');
    Route::post('/umrohs/purchase/{umroh}', [UmrohController::class, 'purchase'])->name('umroh.purchase');
    Route::get('/umrohs/approved-not-purchased', [UmrohController::class, 'showApprovedNotPurchasedUmrohs'])->name('umroh.showApprovedNotPurchasedUmrohs');
    Route::get('/tampilkandatabeliumroh/{id}', [UmrohController::class, 'tampilkandatabeliumroh'])->name('konfirmasi-umroh');
    Route::get('/tampilkandataumroh/{id}', [UmrohController::class, 'tampilkandataumroh'])->name('tampilkandataumroh');
    Route::post('/updatedataumroh/{id}', [UmrohController::class, 'updatedataumroh'])->name('updatedataumroh');
    Route::post('/updatedatabeliumroh/{id}', [UmrohController::class, 'updatedatabeliumroh'])->name('updatedatabeliumroh');
    Route::get('/insertjemaah/{id}', [UmrohController::class, 'createjemaah'])->name('identitasjemaah');
    Route::post('/insertjemaah/{id}', [UmrohController::class, 'storejemaah'])->name('storejemaah');
    Route::get('/trx-umroh', [UmrohController::class, 'tampilkandatatransaksi'])->name('tampilkandatatransaksi');
    Route::post('/umrohs/{id}/approvepayment', [UmrohController::class, 'approvepayment'])->name('umrohs.approvepayment');
});

// Etalase Umroh
Route::get('/crd-umroh', [UmrohController::class, 'showApprovedNotPurchasedUmrohs'])->name('etalase-umroh');

// Other routes
Route::get('/customer', function () {
    return view('Template UI.admin.admin-category-page.customer.customer');
});
