<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\SettingController;
use App\Http\Controllers\Hospital\HospitalController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/expenses', [App\Http\Controllers\HomeController::class, 'expenses'])->name('expenses');

// backend routes

Route::get('/login/admin',[AdminController::class,'adminloginform'])->name('admin.login.form');
Route::get('/signup/admin',[AdminController::class,'adminSignupForm'])->name('admin.signup.form');

Route::post('/login-admin',[AdminController::class,'adminlogin'])->name('admin.login');
Route::get('/signup-admin',[AdminController::class,'adminsignup'])->name('admin.signup');

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',[DashboardController::class,'admindashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminlogout'])->name('admin.logout');

    // agent routes section
    Route::get('/audiance', [AgentController::class, 'audenceAdmin'])->name('audence.Admin');
    Route::get('/agent-add', [AgentController::class, 'addAgent']);
    Route::get('/update/{id}', [AgentController::class, 'updateAgentView']);
    Route::get('/edit/{id}', [AgentController::class, 'editAgentView']);

    // country routes section 
    Route::get('/country', [CountryController::class, 'countryAdmin'])->name('country.Admin');
    Route::get('/country-add', [CountryController::class, 'AddCountry']);
    Route::get('/update-country/{id}', [CountryController::class, 'UpdateCountryView']);
    Route::get('/edit-country/{id}', [CountryController::class, 'editCountry']);

    // client route section
    Route::get('/client-view', [ClientController::class, 'client'])->name('client.view');
    Route::get('/add-client', [ClientController::class, 'addClient']);
    Route::get('/update-clients/{id}', [ClientController::class, 'updateClient']);
    Route::post('/edit-client/{id}', [ClientController::class, 'editClient']);

    // account route section
    Route::get('/account-view', [AccountController::class, 'accountView'])->name('account.view');
    Route::get('/money-send', [AccountController::class, 'moneySend']);
    Route::get('/diposit-view', [AccountController::class, 'dipositView'])->name('account.diposit.view');
    Route::get('/money-diposit', [AccountController::class, 'dipositMoney']);

    // daily expense section
    Route::get('/daily-expenses-view', [AccountController::class, 'expensesView'])->name('daily.expenses.view');
    Route::get('/getSubCategory/{id}', [AccountController::class, 'getSubCategory']);
    Route::get('/daily-expenses-insert', [AccountController::class, 'addDailyExpenses']);
    Route::get('/expenses-status/{id}', [AccountController::class, 'expensesStatus']);
    Route::get('/updated-expenses/{id}', [AccountController::class, 'UpdateexpensesStatus']);
    Route::get('/expenses-search', [AccountController::class, 'expensesSearch']);
    //generate pdf file
    Route::get('/generate-pdf', [AccountController::class, 'generatepdf']);

    // setting section route 
    Route::get('/setting-view', [SettingController::class, 'settingView'])->name('setting.view');
    Route::get('/category-insert', [SettingController::class, 'categoryInsert']);
    Route::get('/sub-category-insert', [SettingController::class, 'subCategoryInsert']);

    // hospital section route 
    Route:: get('/test-details', [HospitalController::class, 'testDetails'])->name('hospital.test.view');
    Route:: get('/setting-hospital', [HospitalController::class, 'settinghospital'])->name('hospital.setting.view');
});