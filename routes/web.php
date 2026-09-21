<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\FaqPublicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
     return redirect('/faqs');
});
// Public support page
Route::get('/faqs', [FaqPublicController::class, 'index'])->name('faqs.public');

// Admin panel
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', FaqCategoryController::class);
    Route::resource('faqs', FaqController::class);
    Route::patch('faqs/{faq}/toggle-publish', [FaqController::class, 'togglePublish'])
        ->name('faqs.toggle-publish');
});
