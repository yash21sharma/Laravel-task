<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\UserController;

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

Route::get('/',function() { 
    return view('welcome');
});

Route::get('/login',[UserController::class,'login']);         
Route::post('/login',[UserController::class,'loginCheck'])->name('login.check');

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'registration'])->name('registration');

Route::get('/admin',[UserController::class,'home'])->middleware('auth');

Route::get('/forget',[UserController::class,'forget']);
Route::post('/forget',[UserController::class,'forgetPassword']);

Route::get('/forget-password',[UserController::class,'password']);
Route::post('/forget-password',[UserController::class,'UpdatePassword']);

Route::get('/profile',[UserController::class,'profile'])->middleware('auth');
Route::put('/profile',[UserController::class,'UpdateProfile'])->name('update.profile')->middleware('auth');

Route::get('/list',[UserController::class,'list'])->middleware('auth');
Route::post('/update-status',[UserController::class,'updateStatus'])->name('updateStatus')->middleware('auth');
Route::get('/change/{id}',[UserController::class,'change']);
Route::put('/change/{id}',[UserController::class,'changestatus']);

Route::get('/table',[UserController::class,'table'])->middleware('auth');

Route::get('/category/add',[UserController::class,'CreateCategory'])->middleware('auth');
Route::post('/category/add',[UserController::class,'AddCategory'])->middleware('auth');

Route::get('/category',[UserController::class,'ViewCategory'])->middleware('auth');
// Route::post('/category',[UserController::class,'Category'])->middleware('auth');

Route::get('/category/edit/{id}',[UserController::class,'Update'])->middleware('auth')->name('Update');
Route::put('/category/update/{id}',[UserController::class,'UpdateCategory'])->middleware('auth')->name('Update.Category');

Route::delete('/category/delete/{id}', [UserController::class, 'delete'])->name('category.delete')->middleware('auth');

Route::get('/posts/add',[UserController::class,'CreatePost'])->middleware('auth');
Route::post('/posts/add',[UserController::class,'AddPost'])->middleware('auth');

Route::get('/post',[UserController::class,'ViewPost']);

Route::get('/post/edit/{id}',[UserController::class,'edit'])->middleware('auth');
Route::put('/post/update/{id}',[UserController::class,'editPost'])->middleware('auth');

Route::delete('/post/delete/{id}',[UserController::class,'DeletePost'])->middleware('auth');

Route::get('/slider/add',[UserController::class,'CreateSlider'])->middleware('auth');
Route::post('/slider/add',[UserController::class,'AddSlider'])->middleware('auth');

Route::get('/slider',[UserController::class,'ViewSlider'])->middleware('auth');

Route::get('/slider/edit/{id}',[UserController::class,'EditSlider'])->middleware('auth');
Route::put('/slider/update/{id}',[UserController::class,'UpdateSlider'])->middleware('auth');

Route::delete('/slider/delete/{id}', [UserController::class, 'DeleteSlider'])->middleware('auth');

//--------------------------------------------------------------------------------------------------//

Route::get('/template/index',[UserController::class,'template']);

Route::get('/category/{id}',[UserController::class,'category']);

// Route::get('/first',[UserController::class,'first']);



