<?php
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

            Route::resource('/pendaftaran', pendaftaranController::class);
            Route::get('/pendaftaran/export/{id?}', [cetakController::class, 'exportPDF'])->name('pendaftaran.export');
        });


        Route::middleware(['assesor'])->group(function () {


        });


        Route::middleware(['mahasiswa'])->group(function () {

            route::get('/pendaftaran-mahasiswa', [userPendaftaranController::class, 'index'])->name('userpendaftaran.index');
            route::post('/pendaftaran-mahasiswa', [userPendaftaranController::class, 'store'])->name('userpendaftaran.store');
            Route::get('/detail-pendaftaran/{id}', [userPendaftaranController::class, 'show'])->name('userpendaftaran.show');
            Route::put('/edit-pendaftaran/{id}', [userPendaftaranController::class, 'update'])->name('userpendaftaran.update');
        });



    });
