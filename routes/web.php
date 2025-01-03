<?php

use App\Livewire\Auth\{Login, Logout, Register, Password};
use App\Livewire\Welcome;
use Illuminate\Support\Facades\{Route};

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('auth.register');
Route::get('/logout', Logout::class)->name('logout');
Route::get('/password/recovery', Password\Recovery::class)->name('password.recovery');

Route::middleware(['auth'])->group(function () {
    Route::get('/', Welcome::class)->name('dashboard');
});
