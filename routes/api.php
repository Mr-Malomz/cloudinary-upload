<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::post('/fileupload', [UploadController::class, 'FileUpload']);
