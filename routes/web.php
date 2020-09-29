<?php

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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/new-home', 'HomeController@new_home');
Route::get('/contact-us', 'HomeController@contactUs')->name('contact');
Route::post('/contact-us', 'HomeController@contact');
Route::get('/mailable', 'HomeController@testEmail');
Route::get('/facebook', 'HomeController@facebook')->name('facebook');
Route::get('/twitter', 'HomeController@twitter')->name('twitter');
Route::get('/instagram', 'HomeController@instagram')->name('instagram');
Route::get('/telegram', 'HomeController@telegram')->name('telegram');
// Route::get('/home', 'HomeController@index')->name('home');
// -----------------------> User Referrals
Route::get('/ref/{code}', 'Auth\RegisterController@referral')->name('referral');

/*
|-----------------------------------
| User Dashboard Route
|-----------------------------------
*/
Route::group(['prefix'=>'/user'], function() {
    Route::get('/home', 'User\DashboardController@index')->name('user.home');

    // ---------------------> Investments
    Route::get('/investments', 'User\DashboardController@investments')->name('user.investments');
    Route::put('/transfer-bonus', 'User\WalletController@transferBonus')->name('user.transfer-bonus');
    Route::get('/investments/manage', 'User\InvestmentController@manageInvestments')->name('user.investments.manage');
    Route::get('/investments/calculate-profit', 'User\InvestmentController@investmentsCalculateProfit')->name('user.investments.calculate-profit');
    Route::get('/investments/{name}', 'User\InvestmentController@investmentsSelect')->name('user.investments.select');
    Route::post('/investments/{name}/invest', 'User\InvestmentController@invest')->name('user.investments.invest');
    // ----------------------> Deposit
    Route::get('/deposit', 'User\DashboardController@deposit')->name('user.deposit');
    Route::post('/deposit/payment/upload', 'User\WalletController@paymentUpload')->name('user.deposit.payment-upload');
    Route::post('/deposit/payment/{status}', 'User\WalletController@paymentStatus')->name('user.deposit.payment-status');
    Route::get('/deposit/payment/{status}', 'User\WalletController@paymentStatus')->name('user.deposit.payment-status');
    // ----------------------> Withdraw
    Route::get('/withdraw', 'User\DashboardController@withdraw')->name('user.withdraw');
    Route::post('/withdraw/', 'User\WalletController@withdrawFunds')->name('user.withdraw.funds');
    Route::put('/withdraw/{withdrawal}/cancel', 'User\WalletController@withdrawCancel')->name('user.withdraw.cancel');
    // -----------------------> Profile
    Route::get('/profile', 'User\DashboardController@profile')->name('user.profile');
    Route::put('/profile', 'User\DashboardController@profile_update')->name('user.profile');
});

/*
|-----------------------------------
| User Dashboard Route
|-----------------------------------
*/
Route::group(['prefix'=>'/admin'], function() {
    Route::get('/home', 'Admin\DashboardController@index')->name('admin.home');

    // ---------------------> Manage User Info
    Route::get('/users', 'Admin\DashboardController@manageUsers')->name('admin.manage.users');
    Route::get('/users/{reg_user}', 'Admin\UserController@viewUser')->name('admin.manage.users.view');
    Route::put('/users/{reg_user}/update-balance', 'Admin\UserController@updateBalance')->name('admin.manage.users.update-balance');
    Route::put('/users/{reg_user}/update-bonus', 'Admin\UserController@updateBonus')->name('admin.manage.users.update-bonus');
    Route::put('/users/{reg_user}/update-email', 'Admin\UserController@updateEmail')->name('admin.manage.users.update-email');
    Route::post('/users/{reg_user}/account-status', 'Admin\UserController@accountStatus')->name('admin.manage.users.account-status');
    Route::post('/users/{reg_user}/deposit', 'Admin\UserController@newDeposit')->name('admin.manage.users.deposit');
    Route::get('/users/{receipt}/deposit/download', 'Admin\UserController@downloadReceipt')->name('admin.manage.users.deposit.download-receipt');
    Route::put('/users/{reg_user}/withdraw', 'Admin\UserController@newWithdrawal')->name('admin.manage.users.withdraw');

    // ----------------------> Packages
    Route::get('/packages', 'Admin\DashboardController@packages')->name('admin.packages');
    Route::post('/packages', 'Admin\DashboardController@newPackages')->name('admin.packages.new');
    Route::put('/packages/{package}/edit', 'Admin\DashboardController@editPackages')->name('admin.packages.edit');
    Route::delete('/packages/{package}/delete', 'Admin\DashboardController@deletePackage')->name('admin.packages.delete');
    Route::put('/packages/{package}/status', 'Admin\DashboardController@statusPackages')->name('admin.packages.status');

    // -----------------------> Settings
    Route::get('/settings', 'Admin\DashboardController@settings')->name('admin.settings');
    Route::put('/settings/{general}/general', 'Admin\SettingsController@editGeneral')->name('admin.settings.general');
    Route::get('/settings/homepage', 'Admin\DashboardController@homepageSettings')->name('admin.settings.homepage');
    Route::put('/settings/{homepage}/homepage', 'Admin\SettingsController@editHomepage')->name('admin.settings.homepage.update');

    // ------------------------> Deposit
    Route::get('/deposit', 'Admin\DashboardController@deposits')->name('admin.deposit');
    Route::post('/deposit', 'Admin\WalletController@newDeposit');

    // -------------------------> Wtihdrawal
    Route::get('/withdraw', 'Admin\DashboardController@withdrawals')->name('admin.withdraw');
    Route::put('/withdraw', 'Admin\WalletController@newWithdrawal');

    // ------------------------> Investments
    Route::get('/investments', 'Admin\DashboardController@investments')->name('admin.investments');
    Route::delete('/investments/{investment}/cancel', 'Admin\WalletController@cancelInvestment')->name('admin.investments.cancel');
});


Auth::routes(['verify'=>true]);
