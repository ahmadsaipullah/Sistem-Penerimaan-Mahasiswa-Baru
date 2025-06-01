<?php

use App\Http\Controllers\jadwalController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\userJadwalController;
use App\Http\Controllers\userPembayaranController;

    use App\Http\Controllers\uploadDokumenController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\dashboardController;
    use App\Http\Controllers\adminController;
    use App\Http\Controllers\pendaftaranController;
    use App\Http\Controllers\userPendaftaranController;
    use App\Http\Controllers\cetakController;
    use App\Http\Controllers\userUploadDokumenController;

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

    // Route::get('/', function () {
    //     return view('pages.dashboard');
    // });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    //login dan register
    require __DIR__ . '/auth.php';

    Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {

        Route::get('/error', function () {
            return view('pages.error'); // Buat halaman error 403
        })->name('error');

            Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::middleware(['admin'])->group(function () {
            // Crud Admin

            Route::resource('/admin', adminController::class);
            // pendaftaran
            Route::get('/pendaftaran', [pendaftaranController::class, 'index'])->name('pendaftaran.index');
            Route::patch ('/pendaftaran/{id}', [pendaftaranController::class, 'update'])->name('pendaftaran.update');
            Route::delete('/pendaftaran/{id}', [pendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
            Route::get('/pendaftaran/export/{id?}', [cetakController::class, 'exportPDF'])->name('pendaftaran.export');

             // Halaman upload dokumen
            Route::get('/upload-dokumen', [uploadDokumenController::class, 'index'])->name('upload_dokumen.index');
            Route::post('/upload-dokumen', [uploadDokumenController::class, 'store'])->name('upload_dokumen.store');
            Route::patch('/upload-dokumen/{id}', [uploadDokumenController::class, 'update'])->name('upload_dokumen.update');
            Route::delete('/upload-dokumen/{id}', [uploadDokumenController::class, 'destroy'])->name('upload_dokumen.destroy');

            Route::post('/upload-dokumen/approve{id}', [uploadDokumenController::class, 'approve'])->name('upload_dokumen.approve');
            Route::post('/upload-dokumen/rejected{id}', [uploadDokumenController::class, 'rejected'])->name('upload_dokumen.rejected');

            // pembayaran
            Route::get('/pembayaran', [pembayaranController::class, 'index'])->name('pembayaran.index');
            Route::post('/pembayaran/store', [pembayaranController::class, 'store'])->name('pembayaran.store');
            Route::patch('/pembayaran/update/{id}', [pembayaranController::class, 'update'])->name('pembayaran.update');
            Route::delete('/pembayaran/delete/{id}', [pembayaranController::class, 'destroy'])->name('pembayaran.destroy');

            Route::post('/pembayaran/approve{id}', [pembayaranController::class, 'approve'])->name('pembayaran.approve');
            Route::post('/pembayaran/rejected{id}', [pembayaranController::class, 'rejected'])->name('pembayaran.rejected');

            // Jadwal
             Route::get('/jadwal', [jadwalController::class, 'index'])->name('jadwal.index');
            Route::post('/jadwal/store', [jadwalController::class, 'store'])->name('jadwal.store');
            Route::patch('/jadwal/update/{id}', [jadwalController::class, 'update'])->name('jadwal.update');
            Route::delete('/jadwal/delete/{id}', [jadwalController::class, 'destroy'])->name('jadwal.destroy');

            Route::post('/jadwal/approve{id}', [jadwalController::class, 'approve'])->name('jadwal.approve');
            Route::post('/jadwal/rejected{id}', [jadwalController::class, 'rejected'])->name('jadwal.rejected');

        });


        Route::middleware(['assesor'])->group(function () {
  // pendaftaran
            Route::get('/pendaftaran', [pendaftaranController::class, 'index'])->name('pendaftaran.index');
            Route::patch ('/pendaftaran/{id}', [pendaftaranController::class, 'update'])->name('pendaftaran.update');
            Route::delete('/pendaftaran/{id}', [pendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
            Route::get('/pendaftaran/export/{id?}', [cetakController::class, 'exportPDF'])->name('pendaftaran.export');

             // Halaman upload dokumen
            Route::get('/upload-dokumen', [uploadDokumenController::class, 'index'])->name('upload_dokumen.index');
            Route::post('/upload-dokumen', [uploadDokumenController::class, 'store'])->name('upload_dokumen.store');
            Route::patch('/upload-dokumen/{id}', [uploadDokumenController::class, 'update'])->name('upload_dokumen.update');
            Route::delete('/upload-dokumen/{id}', [uploadDokumenController::class, 'destroy'])->name('upload_dokumen.destroy');

            Route::post('/upload-dokumen/approve{id}', [uploadDokumenController::class, 'approve'])->name('upload_dokumen.approve');
            Route::post('/upload-dokumen/rejected{id}', [uploadDokumenController::class, 'rejected'])->name('upload_dokumen.rejected');

            // pembayaran
            Route::get('/pembayaran', [pembayaranController::class, 'index'])->name('pembayaran.index');
            Route::post('/pembayaran/store', [pembayaranController::class, 'store'])->name('pembayaran.store');
            Route::patch('/pembayaran/update/{id}', [pembayaranController::class, 'update'])->name('pembayaran.update');
            Route::delete('/pembayaran/delete/{id}', [pembayaranController::class, 'destroy'])->name('pembayaran.destroy');

            Route::post('/pembayaran/approve{id}', [pembayaranController::class, 'approve'])->name('pembayaran.approve');
            Route::post('/pembayaran/rejected{id}', [pembayaranController::class, 'rejected'])->name('pembayaran.rejected');

            // Jadwal
             Route::get('/jadwal', [jadwalController::class, 'index'])->name('jadwal.index');
            Route::post('/jadwal/store', [jadwalController::class, 'store'])->name('jadwal.store');
            Route::patch('/jadwal/update/{id}', [jadwalController::class, 'update'])->name('jadwal.update');
            Route::delete('/jadwal/delete/{id}', [jadwalController::class, 'destroy'])->name('jadwal.destroy');

            Route::post('/jadwal/approve{id}', [jadwalController::class, 'approve'])->name('jadwal.approve');
            Route::post('/jadwal/rejected{id}', [jadwalController::class, 'rejected'])->name('jadwal.rejected');

        });


        Route::middleware(['mahasiswa'])->group(function () {
// pendaftaran
            route::get('/pendaftaran-mahasiswa', [userPendaftaranController::class, 'index'])->name('userpendaftaran.index');
            route::post('/pendaftaran-mahasiswa', [userPendaftaranController::class, 'store'])->name('userpendaftaran.store');
            Route::get('/detail-pendaftaran/{id}', [userPendaftaranController::class, 'show'])->name('userpendaftaran.show');
            Route::patch('/edit-pendaftaran/{id}', [userPendaftaranController::class, 'update'])->name('userpendaftaran.update');
            Route::get('/pendaftaran/export/{id?}', [cetakController::class, 'exportPDF'])->name('pendaftaran.export');
// upload dokumen
            route::get('/dokumen-mahasiswa', [userUploadDokumenController::class, 'index'])->name('userdokumen.index');
            route::post('/dokumen-mahasiswa', [userUploadDokumenController::class, 'store'])->name('userdokumen.store');
            Route::patch('/edit-dokumen/{id}', [userUploadDokumenController::class, 'update'])->name('userdokumen.update');
// pembayaran
            Route::get('/mahasiswa-pembayaran', [userPembayaranController::class, 'index'])->name('userpembayaran.index');
            Route::post('/mahasiswa-pembayaran/store', [userPembayaranController::class, 'store'])->name('userpembayaran.store');
            Route::patch('/mahasiswa-pembayaran/update/{id}', [userPembayaranController::class, 'update'])->name('userpembayaran.update');
// jadwal
            Route::get('/mahasiswa-jadwal', [userJadwalController::class, 'index'])->name('userjadwal.index');
            Route::post('/mahasiswa-jadwal/store', [userJadwalController::class, 'store'])->name('userjadwal.store');
            Route::patch('/mahasiswa-jadwal/update/{id}', [userJadwalController::class, 'update'])->name('userjadwal.update');

        });



    });
