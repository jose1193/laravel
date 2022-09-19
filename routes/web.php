<?php

use Illuminate\Support\Facades\Route;
/* IMPORT CLASS AUTH CONTROLLER*/
use App\Http\Controllers\Auth\AuthController;
/* IMPORT CLASS AUTH CONTROLLER*/

/* IMPORT CLASS FORGOT PASSWORD CONTROLLER*/
use App\Http\Controllers\Auth\ForgotPasswordController;
/* IMPORT CLASS FORGOT PASSWORD CONTROLLER*/

/* IMPORT CLASS CHANGE PASSWORD CONTROLLER*/
use App\Http\Controllers\Auth\ChangePasswordController;
/* IMPORT CLASS CHANGE PASSWORD CONTROLLER*/

/* IMPORT CLASS EMAILS CONTROLLER*/
use App\Http\Controllers\EmailsController;
/* IMPORT CLASS EMAILS CONTROLLER*/

/* IMPORT CLASS FORM CONTACT CONTROLLER*/
use App\Http\Controllers\ContactController;
/* IMPORT CLASS FORM CONTACT  CONTROLLER*/


/* IMPORT CLASS BUDGETS CONTROLLER*/
use App\Http\Controllers\BudgetsController;
/* IMPORT CLASS BUDGETS  CONTROLLER*/


/* IMPORT CLASS COINS CONTROLLER*/
use App\Http\Controllers\CoinsController;
/* IMPORT CLASS COINS  CONTROLLER*/


/* IMPORT CLASS APIS CONTROLLER*/
use App\Http\Controllers\ApisController;
/* IMPORT CLASS APIS  CONTROLLER*/

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
    return view('home');
});


Route::get('/about', function () {
    return view('about');
});


/* ROUTE CONTACT FORM*/
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');
/* END ROUTE CONTACT FORM*/

// ROUTES USER AUTH PAGES
Route::group(['middleware' => ['auth']], function () { // PROTEGER RUTAS SIN USUARIO NO ESTA AUTENTICADO
    
    Route::get('about-user', function () {
        return view('about-user');
    });


/* ROUTE CRUD EMAILS*/
Route::resource('emails', EmailsController::class);
/* END CRUD EMAILS*/


/* ROUTE CRUD BUDGETS*/
Route::resource('budgets', BudgetsController::class);
/* END  CRUD BUDGETS*/
    

/* ROUTE API COINS */
Route::resource('coins', CoinsController::class);
/* END  API COINS */


/* ROUTE API URL */
Route::resource('apisurl', ApisController::class);
/* END  API URL */
    });
    
// END PROTEGER RUTAS SIN USUARIO NO ESTA AUTENTICADO
// END ROUTES USER AUTH PAGES

 /* ----- RUTAS MODULO AUTH*/
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

   
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(['middleware' => ['auth']], function () { // PROTEGER RUTAS SIN USUARIO NO ESTA AUTENTICADO
    
Route::get('change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');  

});// END PROTEGER RUTAS SIN USUARIO NO ESTA AUTENTICADO

/* ROUTE USER VERIFY*/
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
/* FIN ROUTE USER VERIFY*/

/* ------- END RUTAS MODULO AUTH*/
