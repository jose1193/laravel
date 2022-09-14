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


Route::get('/contact', function () {
    return view('contact');
});

// ROUTES USER AUTH PAGES
Route::group(['middleware' => ['auth']], function () { // PROTEGER RUTAS SIN USUARIO NO ESTA AUTENTICADO
    
    Route::get('about-user', function () {
        return view('about-user');
    });
    });// END PROTEGER RUTAS SIN USUARIO NO ESTA AUTENTICADO
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

