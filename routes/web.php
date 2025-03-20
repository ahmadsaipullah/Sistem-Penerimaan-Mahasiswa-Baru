use App\Http\Controllers\adminController;
    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\dashboardController;
    use App\Http\Controllers\adminController;




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



            Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::middleware(['admin'])->group(function () {
            // Crud Admin

            Route::resource('/admin', adminController::class);
        });


        Route::middleware(['assesor'])->group(function () {

        });


        Route::middleware(['mahasiswa'])->group(function () {


        });



    });
