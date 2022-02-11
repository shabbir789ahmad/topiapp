<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\PrivicyController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('get/image',[ModalController::class,'testVideo2'])->name('upload.test');

Route::get('categories',[CategoryController::class,'apiCategory'])->name('get.category');

Route::get('/categories/{id}/songs',[ModalController::class,'songCategory']);

Route::post('fcm-token',[TokenController::class,'token']);

Route::get('privicy/policy', [PrivicyController::class, 'response']);
Route::get('adds/unit/id', [AddController::class, 'apidata']);
Route::get('company/profilr', [AddController::class, 'companyProfile']);
Route::get('admin/videos', [TokenController::class, 'AdminVideos']);
Route::get('all/notifactions', [NotificationController::class, 'notification']);


