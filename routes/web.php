<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\OtomotifController;
use App\Http\Controllers\UmrohController;
use App\Http\Controllers\UserController;

// Rute Umroh
Route::middleware('guest')->group(function () {
    Route::get('/', [UmrohController::class, 'landingGuest'])->name('first');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return view('Template UI.admin.dasboard-admin');
        } else if (auth()->user()->hasRole('user')) {
            return redirect()->route('landing');
        } else {
            return redirect()->route('first');
        }
    })->name('dashboard')->middleware('hakAkses');//---------------------------------------------------------------------->ini masalahnya login

    Route::get('/landing', [UmrohController::class, 'landingRead'])->name('landing');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/crd-umroh', [UmrohController::class, 'showApprovedNotPurchasedUmrohs'])->name('etalase-umroh')->middleware('hakAkses');
    Route::get('/input-umroh', [UmrohController::class, 'index'])->name('umroh')->middleware('hakAkses');
    Route::get('/tambahUmroh', [UmrohController::class, 'tambahUmroh'])->name('tambahUmroh')->middleware('hakAkses');
    Route::get('/deletedataumroh/{id}', [UmrohController::class, 'deletedataumroh'])->name('deletedataumroh')->middleware('hakAkses');
    Route::post('/insertdataumroh', [UmrohController::class, 'insertdataumroh'])->name('insertdataumroh')->middleware('hakAkses');
    Route::post('/umrohs/{id}/approve', [UmrohController::class, 'approve'])->name('umrohs.approve')->middleware('hakAkses');
    Route::post('/umrohs/{umroh}/purchase', [UmrohController::class, 'showPurchaseConfirmation'])->name('umroh.confirmation');//------------------------------------------------------------------------------------> Pembelian Umroh
    Route::post('/umrohs/purchase/{umroh}', [UmrohController::class, 'purchase'])->name('umroh.purchase');//------------------------------------------------------------------------------------> Pembelian Umroh
    Route::get('/umrohs/approved-not-purchased', [UmrohController::class, 'showApprovedNotPurchasedUmrohs'])->name('umroh.showApprovedNotPurchasedUmrohs')->middleware('hakAkses');
    Route::get('/tampilkandatabeliumroh/{id}', [UmrohController::class, 'tampilkandatabeliumroh'])->name('konfirmasi-umroh'); //------------------------------------------------------------------------------------> Pembelian Umroh
    Route::get('/tampilkandataumroh/{id}', [UmrohController::class, 'tampilkandataumroh'])->name('tampilkandataumroh')->middleware('hakAkses');
    Route::post('/updatedataumroh/{id}', [UmrohController::class, 'updatedataumroh'])->name('updatedataumroh')->middleware('hakAkses');
    Route::get('/deletedataumroh/{id}', [UmrohController::class, 'deletedataumroh'])->name('deletedataumroh')->middleware('hakAkses');
    Route::get('/deletetransaksiumroh/{id}', [UmrohController::class, 'deletetransaksiumroh'])->name('deletetransaksiumroh')->middleware('hakAkses');
    Route::post('/updatedatabeliumroh/{id}', [UmrohController::class, 'updatedatabeliumroh'])->name('updatedatabeliumroh'); //------------------------------------------------------------------------------------> Pembelian Umroh
    Route::get('/insertjemaah/{id}', [UmrohController::class, 'createjemaah'])->name('identitasjemaah'); //------------------------------------------------------------------------------------> Pembelian Umroh
    Route::post('/insertjemaah/{id}', [UmrohController::class, 'storejemaah'])->name('storejemaah');//------------------------------------------------------------------------------------> Pembelian Umroh
    Route::get('/trx-umroh', [UmrohController::class, 'tampilkandatatransaksi'])->name('tampilkandatatransaksi')->middleware('hakAkses');
    Route::post('/umrohs/{id}/approvepayment', [UmrohController::class, 'approvepayment'])->name('umrohs.approvepayment')->middleware('hakAkses');
});


// Rute Properti
Route::middleware('auth')->group(function () {
    Route::get('/input-properti', [PropertiController::class, 'index'])->name('property')->middleware('hakAkses');
    Route::get('/tambahProp', [PropertiController::class, 'tambahProp'])->name('tambahProp');  //----------------------------------------------------------------------------------->Ini masalah input prop customer
    Route::get('/crd-umroh', [UmrohController::class, 'showApprovedNotPurchasedUmrohs'])->name('etalase-umroh')->middleware('hakAkses');
    Route::post('/insertdataprop', [PropertiController::class, 'insertdataprop'])->name('insertdataprop'); //----------------------------------------------------------------------------------->Ini masalah input prop customer
    Route::get('/crd-properti', [PropertiController::class, 'showApprovedAndNotPurchasedPropertys'])->name('etalase-prop')->middleware('hakAkses');
    Route::middleware('auth')->post('/Propertys/{property}/approve', [PropertiController::class, 'approve'])->name('propertys.approve')->middleware('hakAkses');
    Route::middleware('auth')->post('/Propertys/{property}/purchased', [PropertiController::class, 'purchase'])->name('propertys.purchased'); //----------------------------------------------------------------------------------->Ini masalah input prop customer
    Route::get('/trx-properti', [PropertiController::class, 'showPurchasedPropertys'])->name('transaksi-prop')->middleware('hakAkses');
    Route::get('/tampilkandataprop/{id}', [PropertiController::class, 'tampilkandataprop'])->name('tampilkandataprop');//----------------------------------------------------------------------------------->Ini masalah input prop customer
    Route::post('/updatedataprop/{id}', [PropertiController::class, 'updatedataprop'])->name('updatedataprop'); //----------------------------------------------------------------------------------->Ini masalah input prop customer
    Route::get('/deletedataprop/{id}', [PropertiController::class, 'deletedataprop'])->name('deletedataprop'); //----------------------------------------------------------------------------------->Ini masalah input prop customer
    Route::get('/tampilkankonfirmasiprop/{id}', [PropertiController::class, 'tampilkankonfirmasiprop'])->name('tampilkankonfirmasiprop'); //-----------------------------------------------------------------> pembelian barang customer
});

// Rute Otomotif
Route::middleware('auth')->group(function () {
    Route::get('/input-oto', [OtomotifController::class, 'index'])->name('otomotif')->middleware('hakAkses');
    Route::get('/tambahOto', [OtomotifController::class, 'tambahOto'])->name('tambahOto'); //----------------------------------------------------------------------------------->Ini masalah input oto customer
    Route::post('/insertdataoto', [OtomotifController::class, 'insertdataoto'])->name('insertdataoto'); //----------------------------------------------------------------------------------->Ini masalah input oto customer
    Route::get('/crd-oto', [OtomotifController::class, 'showApprovedNotPurchasedOtomotifs'])->name('etalase-oto')->middleware('hakAkses');
    Route::middleware('auth')->post('/Otomotif/{otomotif}/approve', [OtomotifController::class, 'approve'])->name('otomotifs.approve')->middleware('hakAkses');
    Route::middleware('auth')->post('/Otomotif/{otomotif}/purchased', [OtomotifController::class, 'purchase'])->name('otomotifs.purchased'); //-----------------------------------------------------------------> pembelian barang customer
    Route::get('/trx-oto', [OtomotifController::class, 'showPurchasedOtomotifs'])->name('transaksi-oto')->middleware('hakAkses');
    Route::get('/tampilkandataoto/{id}', [OtomotifController::class, 'tampildataoto'])->name('tampilkandataoto'); //----------------------------------------------------------------------------------->Ini masalah input oto customer
    Route::post('/updatedataoto/{id}', [OtomotifController::class, 'updatedataoto'])->name('updatedataoto'); //----------------------------------------------------------------------------------->Ini masalah input oto customer
    Route::get('/deletedataoto/{id}', [OtomotifController::class, 'deletedataoto'])->name('deletedataoto'); //----------------------------------------------------------------------------------->Ini masalah input oto customer
    Route::get('/exportdataexcel', [OtomotifController::class, 'exportdataexcel'])->name('exportdataexcel')->middleware('hakAkses'); //------
});

// Rute Lainnya
Route::middleware(['auth'])->group(function () {
    Route::post('/update-role/{userId}', [UserController::class, 'updateRole'])->name('updateRole')->middleware('hakAkses');
    Route::get('/hapususer/{id}', [UserController::class, 'hapusUser'])->name('hapusUser')->middleware('hakAkses');
    Route::get('/dashboard-oto-customer', [OtomotifController::class, 'dashboardOto'])->name('dashboardOto'); //-------------------------------------------------------------------> dashboard barang customer
    Route::get('/dashboard-prop-customer', [PropertiController::class, 'dashboardProp'])->name('dashboardProp'); //-----------------------------------------------------------------> dashboard barang customer
    Route::get('/customer', [UserController::class, 'customerRead'])->name('customer')->middleware('hakAkses');
    Route::post('/otomotif/{id}/approvepayment', [OtomotifController::class, 'approved_payment'])->name('otomotif.approvepayment')->middleware('hakAkses');
    Route::post('/properti/{id}/approvepayment', [PropertiController::class, 'approved_payment'])->name('properti.approvepayment')->middleware('hakAkses');
    Route::get('/tampilkankonfirmasioto/{id}', [OtomotifController::class, 'tampilkankonfirmasioto'])->name('tampilkankonfirmasioto'); //-----------------------------------------------------------------> pembelian barang customer
});

Route::get('/tampilkandetailoto/{id}', [OtomotifController::class, 'tampilkandetailoto'])->name('tampilkandetailoto');
Route::get('/tampilkandetailprop/{id}', [PropertiController::class, 'tampilkandetailprop'])->name('tampilkandetailprop');
Route::get('/tampilkandetailumroh/{id}', [UmrohController::class, 'tampilkandetailumroh'])->name('tampilkandetailumroh');

// Rute Customer
Route::get('/customer', [UserController::class, 'customerRead'])->name('customer');
Route::post('/update-role/{userId}', [UserController::class, 'updateRole'])->name('updateRole');
Route::get('/hapususer/{id}', [UserController::class, 'hapusUser'])->name('hapusUser');
