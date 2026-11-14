<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Public interfaces & features
Route::get('/', [App\Http\Controllers\LawyerController::class, 'welcome'])->name('welcome');
Route::get('/about', [App\Http\Controllers\LawyerController::class, 'about'])->name('about');
Route::get('/service', [App\Http\Controllers\LawyerController::class, 'service'])->name('service');
Route::get('/service/{id}', [App\Http\Controllers\LawyerController::class, 'showService'])->name('service.show');
Route::get('/partner', [App\Http\Controllers\LawyerController::class, 'partner'])->name('partner');
Route::get('/picture', [App\Http\Controllers\LawyerController::class, 'picture'])->name('picture');
Route::get('/article', [App\Http\Controllers\LawyerController::class, 'article'])->name('article');
Route::get('/article/{slug}', [App\Http\Controllers\LawyerController::class, 'showArticle'])->name('article.show');
Route::get('/file', [App\Http\Controllers\LawyerController::class, 'file'])->name('file');
Route::get('/peraturan/{id}', [App\Http\Controllers\LawyerController::class, 'showPeraturan'])->name('peraturan.detail');
Route::get('/contact', [App\Http\Controllers\LawyerController::class, 'contact'])->name('contact');
Route::get('/break-news', [App\Http\Controllers\LawyerController::class, 'news'])->name('break-news');

Route::post('/chatbot', [App\Http\Controllers\ChatbotController::class, 'ask'])->name('chatbot.ask');

Route::get('/view-pdf/{id}', [App\Http\Controllers\LawyerController::class, 'viewPeraturan'])->name('view-pdf');
Route::get('/download-pdf/{id}', [App\Http\Controllers\LawyerController::class, 'downloadPeraturan'])->name('download-pdf');

// Public review submission (rate-limited)
Route::post('reviews', [App\Http\Controllers\ReviewsController::class, 'store'])
    ->middleware('throttle:3,10')
    ->name('reviews.store');

// Admin panel management (protected with auth)
Route::middleware(['auth'])->group(function () {
    Route::resource('legal_opini', App\Http\Controllers\LegalOpiniController::class);
    Route::resource('legal_patnership', App\Http\Controllers\LegalPatnershipController::class);
    Route::resource('peraturan', App\Http\Controllers\PeraturanController::class);
    Route::resource('galery', App\Http\Controllers\GaleryController::class);
    Route::resource('reviews', App\Http\Controllers\ReviewsController::class)->except(['store']);
    Route::resource('news', NewsController::class);
    Route::resource('abouts', App\Http\Controllers\AboutController::class);
    Route::resource('socialmedia', App\Http\Controllers\SocialmediaController::class);
});
