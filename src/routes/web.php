<?php 

use twitesoft\Contact\Http\Controllers\ContactController;

// Route::group(['namespace' => 'twitesoft\Contact\Http\Controllers'],function(){
    
Route::get('contact',[ContactController::class,'index']);
Route::post('contact',[ContactController::class,'store'])->name('contact');
// });
