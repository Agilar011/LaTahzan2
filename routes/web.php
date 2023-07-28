<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmrahController;


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

// setting umrah
// Input data umrah
Route::get('/input-umroh',[UmrahController::class,'index'])->name('umroh');
// etalase otomotif
Route::get('/crd-umroh',[UmrahController::class,'showApprovedAndNotPurchasedUmrahs'])->name('etalase-umroh');
// route approve otomotif
Route::middleware('auth')->post('/umrahs/{umrah}/approve', [UmrahController::class, 'approve'])->name('umrahs.approve');

// // Menampilkan daftar paket umrah
// Route::get('/umrah', [UmrahController::class, 'index'])->name('umrah.index');

// // Menampilkan form tambah data umrah
// Route::get('/umrah/create', [UmrahController::class, 'create'])->name('umrah.create');

// // Menyimpan data umrah yang baru ditambahkan
// Route::post('/umrah', [UmrahController::class, 'store'])->name('umrah.store');

// // Menampilkan detail data umrah berdasarkan ID
// Route::get('/umrah/{id}', [UmrahController::class, 'show'])->name('umrah.show');

// // Menampilkan form edit data umrah berdasarkan ID
// Route::get('/umrah/{id}/edit', [UmrahController::class, 'edit'])->name('umrah.edit');

// // Menyimpan data umrah yang telah diubah
// Route::put('/umrah/{id}', [UmrahController::class, 'update'])->name('umrah.update');

// // Menghapus data umrah berdasarkan ID
// Route::delete('/umrah/{id}', [UmrahController::class, 'destroy'])->name('umrah.destroy');
