<?php

use App\Livewire\Gaji;
use App\Livewire\User;
use App\Livewire\Profil;
use App\Livewire\Kegiatan;
use App\Livewire\Keuangan;
use App\Livewire\Dashboard;
use App\Livewire\GajiIndex;
use App\Livewire\LihatGaji;
use App\Livewire\Transaksi;
use App\Livewire\User\Role;
use App\Livewire\UserIndex;
use App\Livewire\KetuaDewas;
use App\Livewire\Master\Cuti;
use App\Livewire\Master\Saldo;
use App\Livewire\Pemeliharaan;
use App\Livewire\GantiPassword;
use App\Livewire\PengajuanCuti;
use App\Livewire\PerubahanGaji;
use App\Livewire\User\ListRole;
use App\Livewire\ManagementFile;
use App\Livewire\Master\Kategori;
use App\Livewire\User\Permission;
use App\Livewire\Master\Kendaraan;
use App\Livewire\Master\Perawatan;
use App\Livewire\PerubahanJabatan;
use App\Livewire\Master\NamaJabatan;
use Illuminate\Support\Facades\File;
use App\Livewire\KpiPenilaianDireksi;
use Illuminate\Support\Facades\Route;
use App\Livewire\Master\StatusPekerjaan;
use App\Livewire\Master\TingkatPekerjaan;
use App\Http\Controllers\HelperController;
use App\Livewire\Master\CutiAlasanPenting;
use App\Livewire\Master\TunjanganKehadiran;
use App\Livewire\Master\TunjanganMasaKerja;
use App\Http\Controllers\RegisterController;
use App\Livewire\ManagementFileAdministrasi;
use App\Livewire\Master\TunjanganPendidikan;
use App\Http\Controllers\DashboardController;
use App\Livewire\KpiPenilaianDireksiIndex;
use App\Livewire\Master\TunjanganKpiPartimer;
use App\Livewire\Master\TunjanganKpiPelaksanaDivisi;
use App\Livewire\PenilaianSilangDireksi;

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
    //     // Route::get('list-role', ListRole::class)->name('list-role');
    //     // Route::get('role/{id?}', Role::class)->name('role');
    // });

    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::get('user-index', UserIndex::class)->name('user-index');
        Route::get('user/{id?}', User::class)->name('user');
        Route::get('ketua-dewas', KetuaDewas::class)->name('ketua-dewas');
        Route::get('nama-jabatan', NamaJabatan::class)->name('nama-jabatan');
        Route::get('status-pekerjaan', StatusPekerjaan::class)->name('status-pekerjaan');
        Route::get('tingkat-pekerjaan', TingkatPekerjaan::class)->name('tingkat-pekerjaan');
        Route::get('kategori', Kategori::class)->name('kategori');
        Route::get('cuti-alasan-penting', CutiAlasanPenting::class)->name('cuti-alasan-penting');
        Route::get('tunjangan-pendidikan', TunjanganPendidikan::class)->name('tunjangan-pendidikan');
        Route::get('tunjangan-masa-kerja', TunjanganMasaKerja::class)->name('tunjangan-masa-kerja');
        Route::get('tunjangan-kehadiran', TunjanganKehadiran::class)->name('tunjangan-kehadiran');
        Route::get('tunjangan-kpi-pelaksana-divisi', TunjanganKpiPelaksanaDivisi::class)->name('tunjangan-kpi-pelaksana-divisi');
        Route::get('tunjangan-kpi-partimer', TunjanganKpiPartimer::class)->name('tunjangan-kpi-partimer');

    });

    //PESONA
    Route::get('perubahan-gaji', PerubahanGaji::class)->name('perubahan-gaji');
    Route::get('perubahan-jabatan', PerubahanJabatan::class)->name('perubahan-jabatan');
    Route::get('file', ManagementFile::class)->name('file');
    Route::get('file-administrasi', ManagementFileAdministrasi::class)->name('file-administrasi');
    Route::get('gaji-index', GajiIndex::class)->name('gaji-index');
    Route::get('gaji/{id?}', Gaji::class)->name('gaji');
    Route::get('profil', Profil::class)->name('profil');
    Route::get('cuti', Cuti::class)->name('cuti');
    Route::get('pengajuan-cuti', PengajuanCuti::class)->name('pengajuan-cuti');
    Route::get('lihat-gaji', LihatGaji::class)->name('lihat-gaji');
    Route::get('kpi-penilaian/{id?}', KpiPenilaianDireksi::class)->name('kpi-penilaian');
    Route::get('penilaian-silang', PenilaianSilangDireksi::class)->name('penilaian-silang');
    Route::get('kpi-penilaian-index', KpiPenilaianDireksiIndex::class)->name('kpi-penilaian-index');


});
