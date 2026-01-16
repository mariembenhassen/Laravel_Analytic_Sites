<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Volt::route('dashboard', 'dashboard')
    ->name('dashboard')
    ->middleware('auth');
require __DIR__.'/settings.php';
