<?php

use App\Http\Controllers\CropImageController;
use App\Models\CropImage;
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

// CropImage

Route::get('crop-image-upload', [CropImageController::class, 'index']);
Route::post('crop-image-upload-ajax', [CropImageController::class, 'cropImageUploadAjax']);
