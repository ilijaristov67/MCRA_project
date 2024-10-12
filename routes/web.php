<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('delete-user', function () {
    return view('user.delete-user');
})->name('user.delete');

Route::get('update-password', function () {
    return view('user.update-password-form');
})->name('user.password-update');

require __DIR__ . '/auth.php';

Route::get('/user/{id}', function () {
    $id =  Auth::id();
    return view('user', compact('id'));
})->name('user.show')->middleware(['auth']);

Route::get('admin-panel', [AdminController::class, 'adminPanelShow'])->name('admin.adminPanel')->middleware('checkRole');
