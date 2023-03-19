<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersdataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{id?}',[UsersdataController::class,'showdata'])->name('user.show');

// put api
Route::post('/add-user',[UsersdataController::class,'adddata'])->name('user.add');

// add multiple data
Route::post('/add-multipleuser',[UsersdataController::class,'mulpledataadded'])->name('multiple.user.add');
//update data
Route::put('/update-user/{id}',[UsersdataController::class,'userupdate'])->name('user.update');

//update one single data
Route::patch('/update-single-data/{id}',[UsersdataController::class,'updatesinglerecord'])->name('user.single.record');

//delete api for single user

Route::delete('/delete-single-user/{id}',[UsersdataController::class,'deletedata'])->name('user.delete');

//delete user using json

Route::delete('/delete-data-json',[UsersdataController::class,'deletedatajson'])->name('user.delete.json');


