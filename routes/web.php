<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\PostController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);


//__class crud routes__//
 Route::get('category/index',[CategoryController::class, 'index'])->name('category.index');
 Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
 Route::post('category/store',[CategoryController::class, 'store'])->name('category.store');
 Route::get('category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
 Route::post('category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
 Route::get('category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

//__subcategory__//
Route::get('subcategory/index',[SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('subcategory/create',[SubcategoryController::class, 'create'])->name('subcategory.create'); 
Route::post('subcategory/store',[SubcategoryController::class, 'store'])->name('subcategory.store'); 
Route::get('subcategory/delete/{id}',[SubcategoryController::class, 'destroy'])->name('subcategory.delete');
Route::get('subcategory/edit/{id}',[SubcategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('subcategory/update/{id}',[SubcategoryController::class, 'update'])->name('subcategory.update');

//__post routes__//
Route::get('post/create',[PostController::class, 'create'])->name('post.create');

















Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
//this route are show verfication page
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


Route::post('resent-email',[App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name('password.change')->middleware('verified');
Route::post('/password/change', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update.password')->middleware('verified');

