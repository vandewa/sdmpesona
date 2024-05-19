<?php

use App\Livewire\LihatGaji;
use App\Livewire\ManagementFile;
use App\Livewire\Master\Kategori;
use App\Livewire\PengajuanCuti;
use App\Livewire\User;
use App\Livewire\Kegiatan;
use App\Livewire\Keuangan;
use App\Livewire\Dashboard;
use App\Livewire\Transaksi;
use App\Livewire\User\Role;
use App\Livewire\UserIndex;
use App\Livewire\Master\Saldo;
use App\Livewire\Pemeliharaan;
use App\Livewire\User\ListRole;
use App\Livewire\User\Permission;
use App\Livewire\Master\Kendaraan;
use App\Livewire\Master\Perawatan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Gaji;
use App\Livewire\GajiIndex;
use App\Livewire\Master\Cuti;
use App\Livewire\Master\CutiAlasanPenting;
use App\Livewire\Master\NamaJabatan;
use App\Livewire\Master\StatusPekerjaan;
use App\Livewire\Master\TingkatPekerjaan;
use App\Livewire\Master\TunjanganPendidikan;
use App\Livewire\PerubahanGaji;
use App\Livewire\PerubahanJabatan;
use App\Livewire\Profil;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::resource('register', RegisterController::class);

Route::get('docs', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::get('show-picture', [HelperController::class, 'showPicture'])->name('helper.show-picture');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::post('/cetak', [DashboardController::class, 'cetak'])->name('cetak');
    Route::get('ganti-password', [DashboardController::class, 'password'])->name('password');
    Route::post('/ganti-password', [DashboardController::class, 'gantiPassword'])->name('ganti.password');

    Route::get('dashboard', Dashboard::class)->name('dashboard');


    // Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    //     Route::get('list-role', ListRole::class)->name('list-rjole');
    //     Route::get('permission', Permission::class)->name('permission');
    //     Route::get('role/{id?}', Role::class)->name('role');
    // });

    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::get('user-index', UserIndex::class)->name('user-index');
        Route::get('user/{id?}', User::class)->name('user');
        Route::get('nama-jabatan', NamaJabatan::class)->name('nama-jabatan');
        Route::get('status-pekerjaan', StatusPekerjaan::class)->name('status-pekerjaan');
        Route::get('tingkat-pekerjaan', TingkatPekerjaan::class)->name('tingkat-pekerjaan');
        Route::get('kategori', Kategori::class)->name('kategori');
        Route::get('cuti-alasan-penting', CutiAlasanPenting::class)->name('cuti-alasan-penting');
        Route::get('tunjangan-pendidikan', TunjanganPendidikan::class)->name('tunjangan-pendidikan');

    });

    // Route::get('pemeliharaan', Pemeliharaan::class)->name('pemeliharaan');
    // Route::get('kegiatan', Kegiatan::class)->name('kegiatan');
    // Route::get('keuangan', Keuangan::class)->name('keuangan');
    // Route::get('transaksi/{id?}', Transaksi::class)->name('transaksi');


    //PESONA
    Route::get('perubahan-gaji', PerubahanGaji::class)->name('perubahan-gaji');
    Route::get('perubahan-jabatan', PerubahanJabatan::class)->name('perubahan-jabatan');
    Route::get('file', ManagementFile::class)->name('file');
    Route::get('gaji-index', GajiIndex::class)->name('gaji-index');
    Route::get('gaji/{id?}', Gaji::class)->name('gaji');
    Route::get('profil', Profil::class)->name('profil');
    Route::get('cuti', Cuti::class)->name('cuti');
    Route::get('pengajuan-cuti', PengajuanCuti::class)->name('pengajuan-cuti');
    Route::get('lihat-gaji', LihatGaji::class)->name('lihat-gaji');



});
