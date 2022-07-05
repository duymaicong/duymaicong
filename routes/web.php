<?php

use App\Http\Livewire\Comment as LivewireComment;
use App\Http\Livewire\ExportExcel;
use App\Http\Livewire\FixImage;
use App\Http\Livewire\Search;
use App\Http\Livewire\SearchCustomer;
use App\Mail\WellcomeMail;
use Illuminate\Support\Facades\Route;
use App\Models\Comment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

// Route::get('customer/{id?}', function() {
//     $customer = Customer::find($id);
//     return $customer->name . '@' . $customer->phone . '-' . $customer->address;
//  });
Route::get('/wellcome', function () {
    // $comments=Comment::all();
    // $comments=Comment::latest()->get();
    //,compact('comments') compact viet trong view
    return view('welcome');
})->name('wellcome');
Route::get('/', LivewireComment::class)->name('home')->middleware('auth');
Route::group(['middleware'=>'guest'],function(){
    Route::get('/login', \App\Http\Livewire\Login::class)->name('login');
    Route::get('/register', \App\Http\Livewire\Register::class)->name('register');
});

Route::get('/rsa', \App\Http\Livewire\Rsakey::class)->name('rsa')->middleware('auth');
Route::get('/resetDom', \App\Http\Livewire\ResetDom::class)->name('reset')->middleware('auth');
Route::get('/products', \App\Http\Livewire\Product::class)->name('products')->middleware('auth');
// Route::get('find', [SearchController::class,'index']);
// Route::view('/wellcome', '\livewire\counter');
Route::get('/search',SearchCustomer::class)->middleware('auth');
Route::get('/searchCustomer',Search::class)->middleware('auth');
Route::get('/imageChange',FixImage::class)->middleware('auth');
Route::get('customer/{id}', function(Request $request) {
    $id=$request->id;
    $customer = Customer::findOrFail($id);
    $data = 'Name: ' . $customer->name 
        . '<br/>Phone: ' . $customer->phone;
    $data = $customer;
        
    return $data;
 })->name('customer');

 Route::get('searchCustomer/{name}',function(Request $request){
    $name=$request->name;
    $customer =DB::select('select * from customers where name=?', [$name]);
    return $customer;
 });

Route::get('/search/name',function(Request $request){
    $customer = Customer::where('name', 'like', '%' . $request->value . '%')->get();

    return $customer; 
 });


 Route::get('/users/export',ExportExcel::class);


Route::get('/email',function(){
return new WellcomeMail(
);
});
Route::get('/download',ExportExcel::class);
