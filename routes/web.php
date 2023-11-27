<?php

use App\Http\Controllers\AuthorController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/knihy', function () {
    return view('knihy');
})->name('prehled');

Route::get(
    '/autori',
    [AuthorController::class, "vratAutory"]
)->name('autori');

Route::get('/smaz-autora/{id}', [AuthorController::class, 'deleteAutor'])->name('smaz');
