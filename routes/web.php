<?php

use App\Http\Controllers\DificultadeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UserController;
use App\Models\receta;
use GuzzleHttp\Psr7\Request;

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
   
    return view('auth.login');
});
Route::resource('receta',RecetaController::class);

 

Auth::routes();
Route::resource('dificultades',DificultadeController::class);
Route::resource('users',UserController::class);

Route::get('/home', [RecetaController::class, 'index'])->name('home');




Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [RecetaController::class, 'index'])->name('home');  
});
Route::get('/about',[AboutController::class,'about']);
Route::get('about/contact',[AboutController::class,'contact']);
/*Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('dificultades', [DificultadeController::class, 'index'])->name('dificultades');  
    Route::get('users', [UserController::class, 'index'])->name('users');  
    Route::delete('/receta', [RecetaController::class, 'destroy'])->name('receta.destroy');
});*/


Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

