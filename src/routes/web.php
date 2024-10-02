<?php 

use Alamin\Contact\Http\Controllers\ContactController;

// Route::group(['namespace' => 'Alamin\Contact\Http\Controllers'],function(){
    
Route::get('contact',[ContactController::class,'index']);
Route::post('contact',[ContactController::class,'store'])->name('contact');
// });
