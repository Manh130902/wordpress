<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::get('/', [FileUploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload.process');

