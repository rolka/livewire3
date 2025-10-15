<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserLocationController;
use App\Livewire\CompanyCreate;
use App\Livewire\CompanyEdit;
use App\Livewire\LocationCreate;
use App\Livewire\ViewPost;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Livewire\Tasks;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // Route::resource('companies', CompanyController::class);
    Route::get('companies/create', CompanyCreate::class)
        ->name('companies.create');
    Route::get('companies/{company}/edit', CompanyEdit::class)->name('companies.edit');

    Route::get('post/{post}', ViewPost::class)->name('posts.show');

    Route::get('tasks', Tasks\Index::class)->name('tasks.index');


    // Route::resource('locations', UserLocationController::class);
    Route::get('locations/create', LocationCreate::class)->name('locations.create');;

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
