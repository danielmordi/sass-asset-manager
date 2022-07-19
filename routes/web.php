<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Livewire\TenantAdmin\DashboardComponent as TenantAdminDashboard;
use App\Http\Controllers\RedirectIfAuthenticatedController;
use App\Http\Livewire\User\DashboardComponent as UserDashboard;
use App\Http\Livewire\Admin\DashboardComponent as AdminDashboard;


Route::get('/', function () {
    return view('welcome');
});

// Redirect
Route::get('/redirect', [RedirectIfAuthenticatedController::class, 'redirect'])->middleware('auth');

// Invitation
Route::get('/invitation/{user}', [TenantController::class, 'invitation'])->name('invitation');

// Admin
Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
});

// Tenant Admin
Route::middleware(['auth', 'checkRole:tenant-admin'])->prefix('tenant-admin')->name('tenant-admin.')->group(function () {
    Route::get('/dashboard', TenantAdminDashboard::class)->name('dashboard');
});

// User
Route::middleware(['auth', 'checkRole:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('dashboard');
});

require __DIR__.'/auth.php';
