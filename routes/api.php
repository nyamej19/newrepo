<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomesController;
use App\Http\Controllers\Api\ServiceController;
use GuzzleHttp\Middleware;

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

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::post('/buy-home/{user_id}/{home_id}', [HomesController::class, 'Buyhome']);
    Route::get('/all-users', [AuthController::class, 'allUsers']);
    Route::post('/update-home/{home_id}', [HomesController::class, 'updateHome']);
    Route::delete('/delete-home/{home_id}', [HomesController::class, 'delHome']);
    Route::get('/all-serviceperson', [ServiceController::class, 'allServicePerson'])->name('all-serviceperson');
    Route::delete('/remove-serviceperson/{id}', [ServiceController::class, 'removePerson']);
    Route::get('/find-serviceperson/{id}', [ServiceController::class, 'findPerson']);
    Route::get('/find-home/{home_id}', [HomesController::class, 'findHome']);
    Route::post('/update-serviceperson/{id}', [ServiceController::class, 'updatePerson']);


    Route::delete('/remove-service/{id}', [ServiceController::class, 'removeService']);
     Route::get('/my-service', [ServiceController::class, 'myService']);
     Route::post('/req-service', [ServiceController::class, 'reqService'])->name('req-service');
     Route::get('/my-requests', [ServiceController::class, 'myReqs'])->name('my-reqs');



});
Route::post('/signup-service', [ServiceController::class, 'signupService']);
Route::post('/add-service', [ServiceController::class, 'addService'])->name('add-service');
Route::get('/my-profile/{id}' ,[ServiceController::class, 'myProfile']);
Route::get('/all-users', [AuthController::class, 'allUsers']);
 Route::post('/add-home', [HomesController::class, 'addHome']);

Route::get('/all-service', [ServiceController::class, 'allService'])->name('all-service');
 Route::get('/userserviceperson/{id}', [ServiceController::class, 'userServicePerson'])->name('allserviceperson');

Route::post('/add-serviceperson/{service_id}', [ServiceController::class, 'addServicePerson'])->name('service');
Route::post('/auth/register', [AuthController::class, 'createUser'])->name('register');
// Route::post('/login-form', [AuthController::class, 'login'])->name('login');

Route::post('/service-assesment/{user_id}/{serviceperson_id}', [ServiceController::class, 'serviceAss'])->name('service-ass');
Route::get('/homes', [HomesController::class, 'allHomes']);
Route::get('/home-sale', [HomesController::class, 'homeSale']);
Route::get('/home-rent', [HomesController::class, 'homeRent']);



Route::get('/service-select/{service_id}', [ServiceController::class, 'serviceSelect']);
Route::post('/contact-us', [ServiceController::class, 'contactUs']);
Route::get('/top-listings', [HomesController::class, 'topListing']);
