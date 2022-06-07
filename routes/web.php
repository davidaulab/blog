<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Mail\ContactNotification;


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


Route::resource("/articles", ArticlesController::class)->parameters(["articles"]);

Route::get('/', [ArticlesController::class, 'index'])->name ('index');


/*
Route::get('/', [ArticleController::class, 'index'])->name ('index');
Route::get('/home', [ArticleController::class, 'index'])->name ('index');
Route::get('/articles', [ArticleController::class, 'index'])->name ('index');

Route::get('/articlenew', [ArticleController::class, 'create'])->name('newart');
Route::post('/articlenew', [ArticleController::class, 'store']);

Route::get('/article/{id}', [ArticleController::class, 'show']);

*/

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);


Route::get('/contacts', [ContactController::class, 'index']);


Route::get('/about', [AboutController::class, 'index']);


Route::get('/previewemail', function () {
    return new ContactNotification("Motivo", "david@aulab.com");
});
