<?php

use App\Http\Livewire\Comment as LivewireComment;
use Illuminate\Support\Facades\Route;
use App\Models\Comment;

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

// Route::get('/', function () {
//     // $comments=Comment::all();
//     // $comments=Comment::latest()->get();
//     //,compact('comments') compact viet trong view
//     return view('welcome');
// })->name('home');

// Customizing layout

// Route::get('/a', function () {
//     return view('\livewire\counter');
// });
// Route::get('/login', function () {
//     return view('login');
// })->name('login');
// Route::get('/register', function () {
//     return view('register');
// });
// The route we have created to show all blog posts.
// Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);

Route::get('/', LivewireComment::class)->name('home');
Route::get('/login', \App\Http\Livewire\Login::class)->name('login');
Route::get('/register', \App\Http\Livewire\Register::class)->name('register');
Route::get('/rsa', \App\Http\Livewire\Rsakey::class)->name('rsa');
// Route::view('/wellcome', '\livewire\counter');
