<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VillageProfileController;
use App\Http\Controllers\Admin\GovernmentController;
use App\Http\Controllers\Admin\PopulationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\BumdesController;
use App\Http\Controllers\GovernmentPublicController;
use App\Http\Controllers\VillageProfilePublicController;
use App\Http\Controllers\PopulationPublicController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/profil-desa', [VillageProfilePublicController::class, 'index'])->name('profil-desa');
Route::get('/pemerintahan', [GovernmentPublicController::class, 'index'])->name('pemerintahan');
Route::get('/kependudukan', [PopulationPublicController::class, 'index'])->name('kependudukan');
Route::get('/statistik', [StatisticController::class, 'index'])->name('statistik');
Route::get('/berita', [PostController::class, 'index'])->name('berita.index');
Route::get('/berita/{post:slug}', [PostController::class, 'show'])->name('berita.show');
Route::get('/publikasi', [PublicationController::class, 'index'])->name('publikasi.index');
Route::get('/bumdes', [BumdesController::class, 'index'])->name('bumdes.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('settings', SettingController::class)->only(['index', 'store']);
    Route::resource('village-profile', VillageProfileController::class)->only(['index', 'store']);
    Route::resource('governments', GovernmentController::class);
    Route::resource('populations', PopulationController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('publications', \App\Http\Controllers\Admin\PublicationController::class);
    Route::resource('bumdes', \App\Http\Controllers\Admin\BumdesController::class);
});


require __DIR__.'/auth.php';
