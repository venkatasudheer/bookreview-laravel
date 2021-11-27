<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/authors',[AuthorController::class, 'getAuthor'])->name('authors');
Route::get('/createauthors',[AuthorController::class, 'createAuthor'])->name('createauthor');
Route::post('/storeauthors',[AuthorController::class, 'store'])->name('storeauthor');
Route::get('/deleteauthors/{id}',[AuthorController::class, 'deleteAuthor'])->name('deleteauthor');
Route::get('/editauthor/{id}',[AuthorController::class, 'editAuthor'])->name('editauthor');
Route::post('/updateauthor/{id}',[AuthorController::class, 'updateAuthor'])->name('updateauthor');
Route::get('/getbookauthors/{id}',[BookController::class, 'getBooksAuthor'])->name('booksauthor');
Route::get('/getallbooks',[BookController::class, 'getAllBooks'])->name('getallbooks');
Route::get('/createbook',[BookController::class, 'createBook'])->name('createbook');
Route::post('/storebook',[BookController::class, 'store'])->name('storebook');
Route::get('/deletebook/{id}',[BookController::class, 'deleteBook'])->name('deletebook');
Route::post('/updatebook/{id}',[BookController::class, 'updateStore'])->name('updatebook');
Route::get('/editbook/{id}',[BookController::class, 'getBookById'])->name('editbook');
Route::get('/viewbook/{id}',[BookController::class, 'BooksReview'])->name('viewbook');
Route::get('/writereview/{id}',[ReviewController::class, 'bookreview'])->name('writereview');
Route::post('/storereview/{id}',[ReviewController::class, 'store'])->name('storereview');

require __DIR__.'/auth.php';
