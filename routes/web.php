<?php

use App\Http\Controllers\Auth\adminController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\signupController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\mainController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function (){
   return view('layouts.homePage') ;
})->name('home');

Route::get('/contact', [mainController::class, 'contact'])->name('contact');

//Route::get('/books', function (){
//    return view('layouts.bookList') ;
//})->name('books');


Route::get('/login', [loginController::class, 'loginPage'])->name('loginPage')->middleware('admin.login');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/logout',[loginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [signupController::class,'adminDashboard'])->name('dashboard')->middleware('admin.dashboard');
Route::get('/signup', [signupController::class,'signupPage'])->name('signupPage');
Route::post('/signup', [signupController::class, 'adminRegistration'])->name('adminRegistration');

Route::get('/adminlist', [adminController::class, 'adminList'])->name('adminList');

Route::get('/books',[adminController::class, 'books'])->name('books');
Route::get('/add-book',[adminController::class,'addBookPage'])->name('addBookPage');
Route::post('/add-book',[adminController::class, 'addBook'])->name('add-Book');

Route::get('/booklist', [adminController::class, 'bookList'])->name('booklist');
Route::get('/update-book/{id}',[adminController::class, 'updateBook'])->name('update.book');
Route::put('/book-update/{id}', [adminController::class, 'bookUpdate'])->name('book.update');
Route::delete('/delete-book/{id}', [adminController::class, 'deleteBook'])->name('delete.book');

Route::get('/mail', [adminController::class, 'mail'])->name('email');

Route::get('/profile', [adminController::class, 'profilePage'])->name('profile');
Route::get('/profile-edit', [adminController::class, 'editProfile'])->name('profileEdit');
