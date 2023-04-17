<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\ChalyController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\DB;

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
    $topListings =  DB::table('homes')->where('price', '>', "100000000")->get();

    return view('welcome' ,compact('topListings'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/service-page',[ChalyController::class, 'servicePage'])->name('service-page');
    Route::get('/admin-page',[ChalyController::class, 'adminPage'])->name('admin-page');
    Route::get('/user-page',[ChalyController::class, 'userPage'])->name('user-page');
    Route::post('sign-out', [ChalyController::class, 'destroy'])
    ->name('sign-out');
    Route::get('/all-services' ,[ServiceController::class ,'allServices'])->name('all-services');
    Route::get('/add-homepage' ,[AdminController::class,'addHomePage'])->name('add-home-page');
    Route::get('/admin-homes' ,[AdminController::class,'adminHomes'])->name('admin-homes');
    Route::get('/add-service-page' ,[AdminController::class,'addServicePage'])->name('add-service-page');
    Route::get('/admin-services' ,[AdminController::class,'adminServices'])->name('admin-services');
    Route::get('/all-contact-msg' ,[AdminController::class,'allMessages'])->name('all-contact-msg');
    Route::post('/add-home',[AdminController::class,'addHome'])->name('add-home');
    Route::post('/add-service' ,[AdminController::class ,'addService'])->name('add-service');
    Route::delete('/remove-service/{id}',[AdminController::class,'removeService'])->name('remove-service');
    Route::put('/edit-homepage/{id}',[AdminController::class,'editHome'])->name('edit-home');
    Route::get('/edit-homepage/{id}', [AdminController::class, 'editHomePage'])->name('edit-homepage');
    Route::get('/myworkerassesment/{id}' ,[ServiceController::class, 'myworkerassesment'])->name('myworker-assesment');
    Route::delete('/remove-home/{id}',[AdminController::class,'removeHome'])->name('remove-home');
    Route::post('/service-worker-signup/{user_id}/{service_id}',[ServiceController::class,'signupService'])->name('signup-worker');
    Route::get('/myservices' ,[ServiceController::class, 'myServices'])->name('my-services');
    Route::get('/all-assesment' , [AdminController::class, 'allAssesments'])->name('all-assesment');
    Route::get('/admin-userassesment',[AdminController::class, 'userAssesment'])->name('admin-userassesment');
    Route::get('/admin-workerassesment', [AdminController::class, 'workerAssesment'])->name('admin-workerassesment');

    Route::post('/req-service-form/{service_id}/{worker_id}', [ServiceController::class, 'reqServiceForm'])->name('req-service-form');
    Route::get('/user-myservices-request', [UserController::class , 'myServicesRequest'])->name('my-services-request');
    Route::get('/service-myservices-request', [ServiceController::class, 'myServicesRequest'])->name('my-userservices-request');
    Route::post('/buy-home/{id}', [AdminController::class, 'buyHome'])->name('buy-home');
    Route::get('/buy-home-page/{id}', [AdminController::class, 'buyHomePage'])->name('buy-home-page');
    Route::post('/rent-home/{id}', [AdminController::class, 'rentHome'])->name('buy-home');
    Route::get('/rent-home-page/{id}', [AdminController::class, 'rentHomePage'])->name('rent-home-page');
    Route::post('/wishlist/{id}' ,[UserController::class ,'wishList'])->name('wishlist');
    Route::get('/my-wishlist', [UserController::class, 'MywishList'])->name('my-wishlist');
    Route::delete('/remove-wishlist/{id}', [UserController::class, 'removeWish'])->name('remove-wish');
    Route::get('/start-service-user/{serviceperson_id}', [UserController::class, 'startService'])->name('start-service');
    Route::post('/start-service-user-post/{serviceperson_id}', [UserController::class, 'startServicePost'])->name('start-service-post');
    Route::get('/start-service-worker/{user_id}', [ServiceController::class, 'startServiceWorker'])->name('start-sevice-worker');
    Route::post('/start-service-worker-post/{user_id}', [ServiceController::class, 'startServiceWorkerPost'])->name('start-sevice-worker-post');
    Route::get('/user-assesment/{worker_id}', [UserController::class, 'userAssesment'])->name('user-assesment');
    Route::post('/user-assesment/{worker_id}', [UserController::class, 'userAssesmentPost'])->name('user-assesment-post');
    Route::get('/worker-assesment/{user_id}', [ServiceController::class, 'workerAssesment'])->name('worker-assesment');
    Route::post('/worker-assesment/{user_id}', [ServiceController::class, 'workerAssesmentPost'])->name('worker-assesment-post');
});

Route::get('/top-lisitings', [ChalyController::class, 'topListings'])->name('top=listings');
Route::get('/req-service-person/{service_id}', [ServiceController::class, 'reqServicePerson'])->name('req-service-person');
Route::get('/req-service-page/{service_id}/{serviceperson_id}' , [ServiceController::class, 'reqServicePage'])->name('req-service-page');

Route::get('/users-all-services',[ServiceController::class, 'usersAllServices'])->name('user-services');
Route::post('/contact-post',[ChalyController::class, 'contactPost'])->name('contact-post');
// Route::post('register', [ChalyController::class, 'store']) ->name('register-user');
Route::get('/home-rentals' ,[ChalyController::class, 'homeRentals'])->name('home-rentals');
Route::get('/home-sales' ,[ChalyController::class, 'homeSales'])->name('home-sales');
Route::get('/services' ,[ChalyController::class, 'allServices'])->name('services');
Route::get('/partners' ,[ChalyController::class, 'partners'])->name('partners');
Route::get('/about-us' ,[ChalyController::class, 'aboutUs'])->name('about-us');
Route::get('signup-service',[ChalyController::class, 'signUpService'])->name('signup-service');
Route::get('signup-user',[ChalyController::class, 'signUpUser'])->name('signup-user');
Route::get('/signup-admin',[ChalyController::class, 'signUpAdmin'])->name('signup-admin');
Route::post('signup-form',[ChalyController::class, 'signUpForm'])->name('signup-form');
Route::get('contact-us',[ChalyController::class, 'contactUs'])->name('contact-us');
Route::get('all-homes', [ChalyController::class, 'allHomes'])->name('all-homes');



require __DIR__.'/auth.php';
