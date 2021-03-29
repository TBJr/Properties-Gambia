<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\PlotController;



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
    return view('welcome');
});

Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/notifications', function () {
    return view('pages.notifications');
})->name('notifications');

Route::get('/user/mark-all-read/', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return response()->json(['message'=>'marked as read'],200);
});

Route::get('/admin/auth/notifications', 'UserController@getNotifications');

Route::resource('profile', 'ProfileController');

Route::group(['middleware' => ['role:Super-Admin|Admin']], function () {

    Route::resource('permission', 'PermissionController');

    Route::resource('role', 'RoleController');

    Route::resource('user', 'UserController');

});

Route::get('/user', 'UserController@index')->name('user.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/password/change', 'UserController@getPassword')->name('password.change');

Route::post('/password/change', 'UserController@postPassword')->name('password.change');




Route::get('/getPermission', 'PermissionController@getAllPermissions');

Route::get('getRole/{id}', 'RoleController@getAllRole');

Route::post('/saveRole', 'RoleController@store');

Route::put('/editRole/{id}', 'RoleController@update');

Route::get('/get/user', 'UserController@getIndex');

Route::get('/get/user/customer', 'UserController@getCustomer');

Route::get('/get/user/admin', 'UserController@getAdmin');

Route::get('/get/user/user', 'UserController@getUser');

Route::get('/get/user/search/{search}', 'UserController@search');




Route::get('/photo', 'UserController@photo')->name('user.photo');

Route::post('/uploadProfilePhoto', 'UserController@UploadImage');


// Properties
Route::resource('properties', 'PropertiesController');
// Route::resource('properties', PropertiesController::class);
// Route::get('/properties/{properties}', 'ProperpertiesController@show')->name('properties.show');
Route::get('/properties/view', 'PropertiesController@view')->name('properties.view');

// Plot
Route::resource('plot', 'PlotController');
Route::get('/view', 'PlotController@view')->name('plot.view');
Route::get('/view/{id}', 'PlotController@view')->name('plot.view');
// Route::get('/plot/seePlot/{id}', 'PlotController@seePlot')->name('plot.seePlot');
Route::get('/plot/search/{search}', 'PlotController@search');

// Orders
Route::resource('orders', 'OrdersController');
Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
Route::get('/consent', 'OrdersController@consent')->name('orders.consent');
// Route::get('/manage', 'OrdersApiController@manage')->name('orders.edit');
Route::get('/Add/order', 'OrdersController@create')->name('orders.create');
Route::get('/myorders', 'OrdersController@myOrders')->name('orders.myorders');
Route::get('/myorders/{id}', 'OrdersController@approve')->name('orders.approve');
Route::get('/orders/reject/{id}', 'OrdersController@reject')->name('orders.reject');
Route::get('/orders/delivered/{id}', 'OrdersController@delivered')->name('orders.delivered');
Route::get('/orders/ready/{id}', 'OrdersController@ready')->name('orders.ready');
Route::get('/Edit/order/{order}', 'OrdersController@edit')->name('orders.edit');
// Route::get('/modify-order/{id}', 'OrdersController@modify')->name('orders.modify');
Route::get('/search', [UserController::class, 'index']);

// The Client Part
Route::get('/clients', 'ClientController@client')->name('user.client');
// Route::get('/client/info', 'ClientController@info')->name('user.info');
// Route::get('/client', 'ClientController@myClient')->name('user.myclient');
// Route::get('/client/{id}', 'ClientController@myClient')->name('user.myclient');
// Route::get('/client/{client}', 'ClientController@client'); 
