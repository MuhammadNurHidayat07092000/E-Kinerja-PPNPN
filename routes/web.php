<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;

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
    // return view('login');
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:ppnpn'])->group(function () {
    Route::get('/ppnpn', function () {
        return view('ppnpn.dashboard');
    });

    Route::get('/rekap-bulanan', 
        [KegiatanController::class, 'rekapBulanan']
    )->name('kegiatan.rekap');

    Route::resource('kegiatan', KegiatanController::class);

    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
});

// Route::middleware(['auth', 'role:ppnpn'])->group(function () {
//     Route::resource('kegiatan', KegiatanController::class)
//         ->except(['show']);
// });


Route::middleware(['auth', 'role:atasan'])->group(function () {
    Route::get('/atasan', function () {
        return view('atasan.dashboard');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//DASHBOARD BERDASARKAN ROLE
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return view('dashboard.admin');
        } elseif ($role === 'verifikator') {
            return view('dashboard.verifikator');
        }

        return view('dashboard.ppnpn');
    })->name('dashboard');

});


require __DIR__.'/auth.php';
