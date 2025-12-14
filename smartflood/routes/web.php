<?php

use App\Http\Controllers\LokasiSensorController;
use App\Http\Controllers\LaporanBanjirController;
use App\Http\Controllers\ProfileController;
use App\Models\LaporanBanjir;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard (Admin & User)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->role === 'admin') {
        $totalLaporan = LaporanBanjir::count();
        $risikoTinggi = LaporanBanjir::where('status_risiko', 'Tinggi')->count();

        return view('admin.dashboard', compact('totalLaporan', 'risikoTinggi'));
    }

    $laporanUser = LaporanBanjir::where('user_id', $user->id)->count();

    return view('user.dashboard', compact('laporanUser'));

})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware('role')->group(function () {
        Route::resource('lokasi', LokasiSensorController::class);
    });
    Route::get('/laporanbanjir', [LaporanBanjirController::class,'index']);
    Route::post('/laporanbanjir', [LaporanBanjirController::class,'store']);
    Route::delete('/laporanbanjir/{id}', [LaporanBanjirController::class,'destroy']);
});

require __DIR__.'/auth.php';
