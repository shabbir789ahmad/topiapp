<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\PrivicyController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PackageController;

Auth::routes();


Route::group(['middleware'=>'auth'],function(){

  Route::get('/', function () {
    return view('Dashboard.dashboard');
  });

  //categories route 
  Route::get('categorie',[CategoryController::class,'index'])->name('categories');
  
  Route::view('create/category','Dashboard.category.create')->name('category.create');
  Route::Post('upload/create',[CategoryController::class,'create'])->name('create.upload');
  Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
  Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
  Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

  //product route

  Route::get('video',[ModalController::class,'index'])->name('video');
  Route::get('not/approved',[ModalController::class,'index'])->name('not.approve.video');
  Route::get('create',[ModalController::class,'getCategory'])->name('create');
   Route::get('/approve/this/modal',[ModalController::class,'approve']);
  Route::Post('create',[ModalController::class,'create'])->name('create');

  Route::get('/video/{id}/edit', [ModalController::class, 'edit'])->name('video.edit');
  Route::put('/video/{id}', [ModalController::class, 'update'])->name('video.update');
  Route::delete('/video/{id}', [ModalController::class, 'destroy'])->name('video.destroy');
  
  //trained modal 
  
  Route::get('/trains/{id}/modal',[ModalController::class, 'trainedVideo'])->name('tra.modal');
  
   Route::get('/train/videos', [ModalController::class, 'trainVideo'])->name('videos');
   Route::post('upload/test',[ModalController::class,'testVideo'])->name('upload.test4');
   
   Route::view('image','image_upload')->name('image');
  Route::post('create/image',[ModalController::class,'makeVideo'])->name('create.image');
  
 
  
   Route::get('/privicy/policy', [PrivicyController::class, 'index'])->name('privicy.index');
   Route::view('privicy/create','Dashboard/privicy/create')->name('create.privicy');
   Route::post('upload/privicy',[PrivicyController::class,'create'])->name('privicy.store');
   Route::get('/privicy/{id}/update', [PrivicyController::class, 'update'])->name('privicy.edit');
     Route::put('privicy/edit',[PrivicyController::class,'edit'])->name('privicy.update');
   Route::delete('policy/{id}/delete',[PrivicyController::class,'destroy'])->name('policy.delete');  
  //add ids
   Route::get('/adds/id', [AddController::class, 'index'])->name('adds.index');
   Route::put('add/',[AddController::class,'create'])->name('add.store');
   
   Route::get('/company/profile', [AddController::class, 'profile'])->name('add.profile_index');
   Route::view('profile/create','Dashboard/add/profile_create')->name('create.profile');
   Route::post('upload/profile',[AddController::class,'profileCreate'])->name('profile.store');
   Route::delete('delete/{id}/profile',[AddController::class,'destroy'])->name('profile.delete');
   Route::put('profile/update',[AddController::class,'profileUpdate'])->name('profile.update');
   
   //route fotr notification
    //Route::view('image','Dashboard/image')->name('image');
   // Route::post('save/token',[NotificationController::class,'saveToken'])->name('save-token');
    Route::post('/send/notification', [NotificationController::class, 'sendNotification2'])->name('send.notification');
    //route for community videos
    Route::get('/comunity/videos', [CommunityController::class, 'index'])->name('comunity.index');
    Route::get('/comunity/create', [CommunityController::class, 'create'])->name('comunity.create');
    Route::post('upload/comunity/videos',[CommunityController::class,'store'])->name('comunity.store');
    Route::delete('delete/{id}/comunity',[CommunityController::class,'destroy'])->name('comunity.delete');
    Route::get('/get/modals',[CommunityController::class,'getModal']);
   
    Route::get('/all/packages', [PackageController::class, 'index'])->name('all.packages');
      Route::view('package/create','Dashboard/package/create')->name('create.package');
   Route::post('create/package',[AddController::class,'profileCreate'])->name('package.upload');
   Route::delete('delete/{id}/profile',[AddController::class,'destroy'])->name('profile.delete');
   Route::put('profile/update',[AddController::class,'profileUpdate'])->name('profile.update');
});






