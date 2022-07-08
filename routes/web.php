<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkspacesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::name("workspaces.")->middleware("auth")->prefix("/workspaces")->group(function () {

    Route::get("/", [WorkspacesController::class ,"index"])->name("index");

    Route::get("/create", [WorkspacesController::class ,"create"])->name("create");
    Route::post("/create", [WorkspacesController::class ,"store"])->name("store");

    Route::get("/edit/{id}", [WorkspacesController::class ,"edit"])->name("edit");
    Route::post("/edit/{id}", [WorkspacesController::class ,"update"])->name("update");

    Route::delete("/delete/{id}", [WorkspacesController::class, "delete"])->name("delete");


});

Route::get("/all-slugs", [WorkspacesController::class ,"allSlugs"])->name("allSlugs");
