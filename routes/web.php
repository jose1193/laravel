<?php
/*--------------------------------- IMPORT CLASS CONTROLLERs-------------------------------*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BudgetsController;
use App\Http\Controllers\MonthbudgetsController;
use App\Http\Controllers\CoinsController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ApisController;
use App\Http\Controllers\SendbudgetsController;
use App\Http\Controllers\SendmarketsController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BusinessesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MonthlyfoodsController;
use App\Http\Controllers\BuyfoodsController;
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
/* ---------------------------------- PREVENT BROWSER BACK BUTTON AUTH-----------------------*/
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', HomeController::class)->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::get('contact', [ContactController::class, 'contactForm'])->name('contact');
Route::post('contact', [ContactController::class, 'storeContactForm'])->name('contact-form.store');

Route::resource('posts', PostController::class);

/* ---------------------------------- ROUTES USER AUTH PAGES //  GROUP AUTH PROTEGER RUTAS---------- */
Route::group(['middleware' => ['auth']], function () { 
   
Route::resource('foods', BuyfoodsController::class);
Route::get('foods-pdf', [BuyfoodsController::class, 'downloadPdf'])->name('foods-pdf');

Route::resource('monthlyfood', MonthlyfoodsController::class);
Route::resource('emails', EmailsController::class);
Route::resource('budgets', BudgetsController::class);


/* ROUTE CRUD BUSINESSES */
Route::controller(BusinessesController::class)->group(function(){
Route::get('businesses',  'index')->name('businesses.index');
Route::get('create', 'create')->name('businesses.create');
Route::post('businesses.destroy',  'destroy')->name('businesses.destroy'); 
Route::get('businesses.show', 'show')->name('businesses.show'); 
Route::get('businesses/edit', 'edit')->name('businesses.edit'); 
Route::post('businesses.update', 'update')->name('businesses.update'); 
Route::post('businesses.store', 'store')->name('businesses.store'); 
});


Route::resource('monthbudgets', MonthbudgetsController::class);
Route::get('monthbudget-pdf', [MonthbudgetsController::class, 'downloadPdf'])->name('monthbudget-pdf');


Route::resource('coins', CoinsController::class);

Route::resource('calculator', CalculatorController::class);
Route::resource('apisurl', ApisController::class);
Route::resource('sendbudgets', SendbudgetsController::class);
Route::resource('sendmarket', SendmarketsController::class);

Route::get('chart', [ChartJSController::class, 'selectchartbudget'])->name('chart');
Route::post('chart-budgets', [ChartJSController::class, 'budgetchart'])->name('chart.budgetchart'); 
Route::get('chart-monthbudgets', [ChartJSController::class, 'chartmonthbudgets'])->name('chart.monthbudgets');

Route::get('chart-foods', [ChartJSController::class, 'chartfoods'])->name('chart.foods');

Route::get('select-chart-market', [ChartJSController::class, 'selectchartmarket'])->name('select-chart-market');
Route::post('chart-market', [ChartJSController::class, 'chartmarket'])->name('chart.chartmarket'); 
   
/* ROUTE ENVIAR VARIABLE POR PARAMETROS BUDGETS A MONTHBUDGETS 
Route::get('monthbudgets/{id}', function ($id) {
       
    });
 END ROUTE ENVIAR VARIABLE POR PARAMETROS BUDGETS A MONTHBUDGETS */
});
/* ---------------------------------- END ROUTES USER AUTH PAGES // END GROUP PROTEGER RUTAS ------------------------*/


 /* ---------------------------------- RUTAS MODULO AUTH------------------------*/
 
Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->middleware('guest')->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth'); 
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('users-list', [AuthController::class, 'lists'])->middleware('auth')->name('list');
Route::get('new-user', [AuthController::class, 'create'])->middleware('auth')->name('auth.create'); 
Route::post('new-user', [AuthController::class, 'store'])->name('auth.store'); 
Route::post('destroy', [AuthController::class, 'destroy'])->name('auth.destroy'); 
Route::get('show', [AuthController::class, 'show'])->middleware('auth')->name('auth.show'); 
Route::get('edit', [AuthController::class, 'edit'])->middleware('auth')->name('auth.edit'); 
Route::post('update', [AuthController::class, 'update'])->name('auth.update'); 

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
       
Route::get('change-password', [ChangePasswordController::class, 'index'])->middleware('auth');
Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->middleware('auth')->name('change.password');


/* ROUTE USER VERIFY*/
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
/* FIN ROUTE USER VERIFY*/

/* ------------------------------------------------- END RUTAS MODULO AUTH-----------------------*/
}); /* ------------------------------------------------- END PREVENT BROWSER BACK BUTTON AUTH-----------------------*/