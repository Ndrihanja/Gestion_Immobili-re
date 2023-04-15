<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\AgenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\TerrainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

/** for side bar menu active */
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });
    Route::get('home', function () {
        return view('home');
    });
});

Auth::routes();

// ----------------------------login ------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('change/password', 'changePassword')->name('change/password');
});

// ----------------------------- register -------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'storeUser')->name('register');
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
    Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
    Route::get('agence/dashboard', 'agenceDashboardIndex')->middleware('auth')->name('agence/dashboard');
    Route::get('client/dashboard', 'clientDashboardIndex')->middleware('auth')->name('client/dashboard');
    Route::get('logement/dashboard', 'clientDashboardIndex')->middleware('auth')->name('logement/dashboard');
    Route::get('terrain/dashboard', 'clientDashboardIndex')->middleware('auth')->name('terrain/dashboard');
});

// ----------------------------- user controller -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('list/users', 'index')->middleware('auth')->name('list/users');
    Route::post('change/password', 'changePassword')->name('change/password');
    Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
    Route::post('user/update', 'userUpdate')->name('user/update');
    Route::post('user/delete', 'userDelete')->name('user/delete');
});


// ------------------------ setting -------------------------------//
Route::controller(Setting::class)->group(function () {
    Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
});

// ------------------------ agence -------------------------------//
Route::controller(AgenceController::class)->group(function () {
    Route::get('agence/list', 'index')->middleware('auth')->name('agence/list');
    Route::get('/agence/pdf', 'generatePdf')->middleware('auth')->name('agence/pdf');
    Route::get('agence/grid', 'agenceGrid')->middleware('auth')->name('agence/grid');
    Route::get('agence/add/page', 'agenceAdd')->middleware('auth')->name('agence/add/page');
    Route::post('agence/add/save', 'agenceSave')->name('agence/add/save');
    Route::get('agence/edit/{id}', 'agenceEdit');
    Route::post('agence/update', 'agenceUpdate')->name('agence/update');
});

// ------------------------ cite -------------------------------//
Route::controller(CiteController::class)->group(function () {
    Route::get('cite/list', 'index')->middleware('auth')->name('cite/list');
    Route::get('/cite/pdf', 'generatePdf')->middleware('auth')->name('cite/pdf');
    Route::get('cite/grid', 'citeGrid')->middleware('auth')->name('cite/grid');
    Route::get('cite/add/page', 'citeAdd')->middleware('auth')->name('cite/add/page');
    Route::post('cite/add/save', 'citeSave')->name('cite/add/save');
    Route::get('cite/edit/{id}', 'citeEdit');
    Route::post('cite/update', 'citeUpdate')->name('cite/update');
    Route::post('cite/delete', 'citeDelete')->name('cite/delete');
});

// ------------------------ client -------------------------------//
Route::controller(ClientController::class)->group(function () {
    Route::get('client/list', 'index')->middleware('auth')->name('client/list');
    Route::get('/client/pdf', 'generatePdf')->middleware('auth')->name('client/pdf');
    Route::get('client/grid', 'clientGrid')->middleware('auth')->name('client/grid');
    Route::get('client/add/page', 'clientAdd')->middleware('auth')->name('client/add/page');
    Route::post('client/add/save', 'clientSave')->name('client/add/save');
    Route::get('client/edit/{id}', 'clientEdit');
    Route::post('client/update', 'clientUpdate')->name('client/update');
});

// ------------------------ terrain -------------------------------//
Route::controller(TerrainController::class)->group(function () {
    Route::get('terrain/list', 'index')->middleware('auth')->name('terrain/list');
    Route::get('/terrain/pdf', 'generatePdf')->middleware('auth')->name('terrain/pdf');
    Route::get('terrain/grid', 'terrainGrid')->middleware('auth')->name('terrain/grid');
    Route::get('terrain/add/page', 'terrainAdd')->middleware('auth')->name('terrain/add/page');
    Route::post('terrain/add/save', 'terrainSave')->name('terrain/add/save');
    Route::get('terrain/edit/{id}', 'terrainEdit');
    Route::post('terrain/update', 'terrainUpdate')->name('terrain/update');
    Route::post('terrain/delete', 'terrainDelete')->name('terrain/delete');
});

// ------------------------ logement -------------------------------//
Route::controller(LogementController::class)->group(function () {
    Route::get('logement/list', 'index')->middleware('auth')->name('logement/list');
    Route::get('/logement/pdf', 'generatePdf')->middleware('auth')->name('logement/pdf');
    Route::get('logement/grid', 'logementGrid')->middleware('auth')->name('logement/grid');
    Route::get('logement/add/page', 'logementAdd')->middleware('auth')->name('logement/add/page');
    Route::post('logement/add/save', 'logementSave')->name('logement/add/save');
    Route::get('logement/edit/{id}', 'logementEdit');
    Route::post('logement/update', 'logementUpdate')->name('logement/update');
    Route::post('logement/delete', 'logementDelete')->name('logement/delete');
});

// ------------------------ vente -------------------------------//
Route::controller(AchatController::class)->group(function () {
    Route::get('vente/list', 'index')->middleware('auth')->name('vente/list');
    Route::get('/vente/pdf', 'generatePdf')->middleware('auth')->name('vente/pdf');
    Route::get('vente/grid', 'venteGrid')->middleware('auth')->name('vente/grid');
    Route::get('vente/add/page', 'venteAdd')->middleware('auth')->name('vente/add/page');
    Route::post('vente/add/save', 'venteSave')->name('vente/add/save');
    Route::get('vente/edit/{id}', 'venteEdit');
    Route::post('vente/update', 'venteUpdate')->name('vente/update');
    Route::post('vente/delete', 'venteDelete')->name('vente/delete');
    Route::get('vente/facture/{id}', 'generateFacture');
});

// ------------------------ office -------------------------------//
Route::controller(OfficeController::class)->group(function () {
    Route::get('office/landing', 'index')->name('office/landing');
    Route::get('office/propos', 'propos')->name('office/propos');
});
