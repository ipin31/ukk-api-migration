<?php
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\DashboardStudentManager;
use App\Livewire\DashboardStudentList;
use App\Livewire\DashboardMentorManager;
use App\Livewire\DashboardInternshipManager;
use App\Livewire\DashboardInternshipList;
use App\Livewire\DashboardCompanyManager;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});


Route::middleware(['auth', 'role:super_admin|Teacher'])->group(function () {
    Route::get('/siswa', DashboardStudentManager::class)->name('siswa.index');
});

Route::middleware(['auth', 'role:super_admin|Teacher'])->group(function () {
    Route::get('/listsiswa', DashboardStudentList::class)->name('list.siswa');
});

Route::middleware(['auth', 'role:super_admin|Teacher'])->group(function () {
    Route::get('/gurupembimbing', DashboardMentorManager::class)->name('guru.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pkl', DashboardInternshipManager::class)->name('pkl.index');
});

Route::middleware(['auth', 'role:super_admin|Teacher'])->group(function () {
    Route::get('/laporanpkl', DashboardInternshipList::class)->name('laporan.pkl');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/industri', DashboardCompanyManager::class)->name('industri.index');
});

require __DIR__ . '/auth.php';
