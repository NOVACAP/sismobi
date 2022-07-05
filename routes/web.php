<?php

use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\FileUploadRequestController;
use App\Http\Livewire\Admin\Transports\ListCombustiveis;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Transports\ListTransports;
use App\Http\Livewire\Admin\Users\ListUsers;

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

Route::get('admin/dashboard', DasboardController::class)->name('admin.dashboard');
Route::get('admin/users', ListUsers::class)->name('admin.users');
Route::get('admin/transports', ListTransports::class)->name('admin.transports');
Route::get('admin/combustivel', ListCombustiveis::class)->name('admin.combustivel');

Route::get('admin/export', [ListUsers::class, 'export'])->name('export.user');
//Route::get('admin/exportVT', [ListTransports::class, 'exportVTransport'])->name('export.user');

// rotas para o uso do fileupload
Route::get('upload-file', [FileUpload::class, 'createForm']);
Route::post('upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
Route::get('uploadFile', [FileUploadRequestController::class, 'index']);
Route::post('uploadFile', [FileUploadRequestController::class, 'store'])->name('file.store');