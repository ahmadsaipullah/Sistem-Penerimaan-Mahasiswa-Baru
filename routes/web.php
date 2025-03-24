<?php

    use App\Http\Controllers\uploadDokumenController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\dashboardController;
    use App\Http\Controllers\adminController;
    use App\Http\Controllers\pendaftaranController;
    use App\Http\Controllers\userPendaftaranController;
    use App\Http\Controllers\cetakController;

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
            Route::put('/upload-dokumen/{id}', [uploadDokumenController::class, 'update'])->name('upload_dokumen.update');
            Route::delete('/upload-dokumen/{id}', [uploadDokumenController::class, 'destroy'])->name('upload_dokumen.destroy');
        });


        Route::middleware(['assesor'])->group(function () {


        });


        Route::middleware(['mahasiswa'])->group(function () {

            route::get('/pendaftaran-mahasiswa', [userPendaftaranController::class, 'index'])->name('userpendaftaran.index');
            route::post('/pendaftaran-mahasiswa', [userPendaftaranController::class, 'store'])->name('userpendaftaran.store');
            Route::get('/detail-pendaftaran/{id}', [userPendaftaranController::class, 'show'])->name('userpendaftaran.show');
            Route::patch('/edit-pendaftaran/{id}', [userPendaftaranController::class, 'update'])->name('userpendaftaran.update');
            Route::get('/pendaftaran/export/{id?}', [cetakController::class, 'exportPDF'])->name('pendaftaran.export');
        });



    });
