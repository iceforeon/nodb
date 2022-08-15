<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => view('welcome'))
    ->name('welcome');

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware('auth')
    ->name('dashboard');

Route::group([
    'prefix' => 'documents',
    'as' => 'documents.',
    'middleware' => 'auth',
], function () {
    Route::get('/', fn () => view('documents.index'))
        ->name('index');

    Route::get('documents', fn () => view('documents.create'))
        ->name('create');

    Route::get('{slug}/edit', fn ($slug) => view('documents.edit', ['slug' => $slug]))
        ->name('edit');
});

require __DIR__.'/auth.php';
