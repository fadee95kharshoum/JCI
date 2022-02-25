<?php

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', function () {
    return view('landing.index');
});
Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/users', 'admin\UsersController');
    Route::get('/users/{id}/impersonate', 'admin\UsersController@impersonate')->name('imperosnate');
    Route::get('/stopimpersonate', 'admin\UsersController@stopImper')->name('stopImper');
    Route::get('logs', 'LogController@index')->name('logs.index');
    Route::get('logs/delete', 'LogController@destroy')->name('logs.delete');

    Route::get('country/{country}', 'CountryController@gallery')->name('countstore');
    Route::get('game/{game}', 'GameController@packages')->name('packstore');
    Route::get('store', 'CardController@gallery')->name('store');
    Route::get('storep', 'GameController@gallery')->name('storep');
    Route::resource('cards', 'CardController');
    Route::resource('types', 'TypeController')->except(['edit','update','create']);
    Route::resource('countries', 'CountryController');
    Route::resource('orders', 'OrderController');
    Route::resource('games', 'GameController');
    Route::resource('points', 'PointController')->except(['edit','update','create']);
    Route::resource('porders', 'PorderController');
    Route::resource('transactions', 'TransactionController');

######################################### My Routes #################################################
    // Projects
    // Route::resource('projects', 'ProjectController');
    Route::get('projects', 'ProjectController@index')->name('projects.index');
    Route::get('projects/create', 'ProjectController@create')->name('projects.create');
    Route::post('projects/store', 'ProjectController@store')->name('projects.store');
    Route::get('projects/show/{id}', 'ProjectController@show')->name('projects.show');
    Route::get('projects/edit/{id}', 'ProjectController@edit')->name('projects.edit');
    Route::post('projects/update/{id}', 'ProjectController@update')->name('projects.update');
    Route::get('projects/destroy/{id}', 'ProjectController@destroy')->name('projects.destroy');


    //members
    //Route::resource('members', 'MemberController');
    Route::get('members', 'MemberController@index')->name('members.index');
    Route::get('members/create', 'MemberController@create')->name('members.create');
    Route::post('members/store', 'MemberController@store')->name('members.store');
    Route::get('members/show/{id}', 'MemberController@show')->name('members.show');
    Route::get('members/edit/{id}', 'MemberController@edit')->name('members.edit');
    Route::post('members/update/{id}', 'MemberController@update')->name('members.update');
    Route::get('members/destroy/{id}', 'MemberController@destroy')->name('members.destroy');


    //partners
    // Route::resource('partners', 'PartnerController');
    Route::get('partners', 'PartnerController@index')->name('partners.index');
    Route::get('partners/create', 'PartnerController@create')->name('partners.create');
    Route::post('partners/store', 'PartnerController@store')->name('partners.store');
    Route::get('partners/show/{id}', 'PartnerController@show')->name('partners.show');
    Route::get('partners/showInfo/{id}', 'PartnerController@showinfo')->name('partners.show.info');
    Route::get('partners/edit/{id}', 'PartnerController@edit')->name('partners.edit');
    Route::post('partners/update/{id}', 'PartnerController@update')->name('partners.update');
    Route::get('partners/destroy/{id}', 'PartnerController@destroy')->name('partners.destroy');

    //services
    //Route::resource('services', 'ServiceController');
    Route::get('services', 'ServiceController@index')->name('services.index');
    Route::get('services/create', 'ServiceController@create')->name('services.create');
    Route::post('services/store', 'ServiceController@store')->name('services.store');
    Route::get('services/show/{id}', 'ServiceController@show')->name('services.show');
    Route::get('services/edit/{id}', 'ServiceController@edit')->name('services.edit');
    Route::post('services/update/{id}', 'ServiceController@update')->name('services.update');
    Route::get('services/destroy/{id}', 'ServiceController@destroy')->name('services.destroy');

    //Mettings
    //Route::resource('mettings', 'MettingController');
    Route::get('mettings', 'MettingController@index')->name('mettings.index');
    Route::get('mettings/create', 'MettingController@create')->name('mettings.create');
    Route::post('mettings/store', 'MettingController@store')->name('mettings.store');
    Route::get('mettings/show/{id}', 'MettingController@show')->name('mettings.show');
    Route::get('mettings/edit/{id}', 'MettingController@edit')->name('mettings.edit');
    Route::post('mettings/update/{id}', 'MettingController@update')->name('mettings.update');
    Route::get('mettings/destroy/{id}', 'MettingController@destroy')->name('mettings.destroy');

    // Financial
    //Route::resource('financials', 'FinancialController');
    Route::get('financials', 'FinancialController@index')->name('financials.index');
    Route::get('financials/create', 'FinancialController@create')->name('financials.create');
    Route::post('financials/store', 'FinancialController@store')->name('financials.store');
    Route::get('financials/show/{id}', 'FinancialController@show')->name('financials.show');
    Route::get('financials/edit/{id}', 'FinancialController@edit')->name('financials.edit');
    Route::post('financials/update/{id}', 'FinancialController@update')->name('financials.update');
    Route::get('financials/destroy/{id}', 'FinancialController@destroy')->name('financials.destroy');

    //Kpis
    //Route::resource('kpis', 'KpiController');
    Route::get('kpis', 'KpiController@index')->name('kpis.index');
    Route::get('kpis/create', 'KpiController@create')->name('kpis.create');
    Route::post('kpis/store', 'KpiController@store')->name('kpis.store');
    Route::get('kpis/show/{id}', 'KpiController@show')->name('kpis.show');
    Route::get('kpis/edit/{id}', 'KpiController@edit')->name('kpis.edit');
    Route::post('kpis/update/{id}', 'KpiController@update')->name('kpis.update');
    Route::get('kpis/destroy/{id}', 'KpiController@destroy')->name('kpis.destroy');
});
