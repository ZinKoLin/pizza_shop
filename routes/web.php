<?php

use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\PizzaController;
use App\Http\Controllers\Admin\CategoryController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->get('/dashboard',function () {

        if(Auth::check()){
            if(Auth::user()-> role =='admin'){
                return redirect()->route('admin#profile');
            }elseif(Auth::user()-> role == 'user'){
                return redirect()->route('user#index');

            }
        }
    })->name('dashboard');


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

    //Route::get('/',[AdminController::class,'index'])->name('admin#index');
    Route::get('/profile',[CategoryController::class,'profile'])->name('admin#profile');

    Route::get('category',[CategoryController::class,'category'])->name('admin#category');//list
    Route::get('add_category',[CategoryController::class,'categoryCreate'])->name('admin#create_category');
    Route::post('store_category',[CategoryController::class,'categoryStore'])->name('admin#create_store');
    Route::get('delete_category/{id}',[CategoryController::class,'deleteCategory'])->name('admin#delete_category');
    Route::get('update_category/{id}',[CategoryController::class,'updateCategory'])->name('admin#update_category');
    Route::post('editCategory',[CategoryController::class,'editCategory'])->name('admin#edit_category');
    Route::post('category',[CategoryController::class,'searchCategory'])->name('admin#search_category');//search ==list url


    Route::get('pizza',[PizzaController::class,'pizza'])->name('admin#pizza');
    Route::get('createPizza',[PizzaController::class,'createPizza'])->name('admin#create_pizza');
    Route::post('createPizza',[PizzaController::class,'storePizza'])->name('admin#store_pizza');
    Route::get('deletePizza/{id}',[PizzaController::class,'deletePizza'])->name('admin#delete_pizza');

});



Route::group(['prefix'=>'user'],function(){
    Route::get('/',[UserController::class,'index'])->name('user#index');


});
