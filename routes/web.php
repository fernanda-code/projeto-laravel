<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TreinadorController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/alunos', function () {
    return view('alunos.create');
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

route::resource('alunos', AlunoController::class)->middleware('auth');

route::resource('treinadores', TreinadorController::class)->middleware('auth');

require __DIR__.'/auth.php';
