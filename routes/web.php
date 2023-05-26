<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BackEnd\FaqController;
use App\Http\Controllers\BackEnd\MenuController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackEnd\SettingController;
use App\Http\Controllers\BackEnd\SubMenuController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BackEnd\CorporateClientController;

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


Route::get('/', [HomeController::class,'index'])->name('home');


Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class,'register']);

Route::get('password/forget',  function () {
	return view('pages.forgot-password');
})->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


Route::group(['middleware' => 'auth'], function(){
	// logout route
	Route::get('/logout', [LoginController::class,'logout']);
	Route::get('/clear-cache', [HomeController::class,'clearCache']);

	// dashboard route
	Route::get('/dashboard', function () {
		return view('pages.dashboard');
	})->name('dashboard');

	//only those have manage_user permission will get access
	Route::group(['middleware' => 'can:manage_user'], function(){
	Route::get('/users', [UserController::class,'index']);
	Route::get('/user/get-list', [UserController::class,'getUserList']);
		Route::get('/user/create', [UserController::class,'create']);
		Route::post('/user/create', [UserController::class,'store'])->name('create-user');
		Route::get('/user/{id}', [UserController::class,'edit'])->name('edit-user');
		Route::post('/user/update', [UserController::class,'update']);
		Route::get('/user/delete/{id}', [UserController::class,'delete']);
	});

	//only those have manage_role permission will get access
	Route::group(['middleware' => 'can:manage_role|manage_user'], function(){
		Route::get('/roles', [RolesController::class,'index']);
		Route::get('/role/get-list', [RolesController::class,'getRoleList']);
		Route::get('/role/create', [RolesController::class,'create'])->name('role.create');
        Route::post('/role/store', [RolesController::class,'store'])->name('role-store');
		Route::get('/role/edit/{id}', [RolesController::class,'edit'])->name('role-edit');
		Route::post('/role/update', [RolesController::class,'update']);
		Route::get('/role/delete/{id}', [RolesController::class,'delete']);
	});


	//only those have manage_permission permission will get access
	Route::group(['middleware' => 'can:manage_permission|manage_user'], function(){
		Route::get('/permission', [PermissionController::class,'index']);
		Route::get('/permission/get-list', [PermissionController::class,'getPermissionList']);
		Route::post('/permission/create', [PermissionController::class,'create']);
		Route::get('/permission/update', [PermissionController::class,'update']);
		Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
	});

	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);

    //settings
    Route::get('settings', [SettingController::class, 'Settings'])->name('settings');
    Route::post('settings-store', [SettingController::class, 'SettingStore'])->name('settings-store');

    //menu
    Route::get('menu', [MenuController::class, "index"])->name('menu.index');
    Route::get('menu/create', [MenuController::class, "store"])->name('menu.store');
    Route::get('menu/edit/{id}', [MenuController::class, "edit"])->name('menu.edit');
    Route::get('menu/update/{id}', [MenuController::class, "update"])->name('menu.update');
    Route::delete('menu/destory/{id}', [MenuController::class, "destroy"])->name('menu.destroy');
    Route::get('menu-status', [MenuController::class, "StatusChange"])->name('menu-status');

    //sub menu
    Route::get('sub-menu', [SubMenuController::class, "index"])->name('sub-menu.index');
    Route::get('sub-menu/create', [SubMenuController::class, "store"])->name('sub-menu.store');
    Route::get('sub-menu/edit/{id}', [SubMenuController::class, "edit"])->name('sub-menu.edit');
    Route::get('sub-menu/update/{id}', [SubMenuController::class, "update"])->name('sub-menu.update');
    Route::delete('sub-menu/destory/{id}', [SubMenuController::class, "destroy"])->name('sub-menu.destroy');
    Route::get('sub-menu-status', [SubMenuController::class, "StatusChange"])->name('sub-menu-status');

    //faq
    Route::resource('faq', FaqController::class);
    Route::get('faq-status', [FaqController::class, "StatusChange"])->name('faq-status');

    //corporate client
    Route::resource('corporate-client', CorporateClientController::class);
    Route::get('client-status', [CorporateClientController::class, "StatusChange"])->name('client-status');

});


Route::get('/register', function () { return view('pages.register'); });
Route::get('/login-1', function () { return view('pages.login'); });
