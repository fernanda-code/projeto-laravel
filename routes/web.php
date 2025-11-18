<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TreinadorController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AlunosAulasController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::delete('alunos_aulas/{aluno_id}/{aula_id}', [AlunosAulasController::class, 'destroy'])
    ->name('alunos_aulas.destroy');

    Route::resource('alunos', AlunoController::class);
    Route::resource('treinadores', TreinadorController::class);
    Route::resource('planos', PlanoController::class);
    Route::resource('aulas', AulaController::class);
    Route::resource('alunos_aulas', AlunosAulasController::class)->except(['destroy']);

});

require __DIR__.'/auth.php';
