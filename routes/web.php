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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/notifications', function () {
    return view('admin.pages.notifications');
})->name('notifications');

Route::get('/user/mark-all-read/', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return response()->json(['message'=>'marked as read'],200);
});

Route::get('/admin/auth/notifications', 'UserController@getNotifications');

Route::resource('profile', 'ProfileController');

// Route for deleted users


// Approval for new Users

Route::middleware(['auth', 'active_user'])->group(function () {
    Route::get('/approval', 'HomeController@approval')->name('approval');

    Route::middleware(['approved'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
    });
});

Route::group(['middleware' => ['role:Super-Admin|Admin|CEO']], function () {

    Route::resource('permission', 'PermissionController');

    Route::resource('role', 'RoleController');

    Route::resource('user', 'UserController');

});

Route::get('/user', 'UserController@index')->name('user.index');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/password/change', 'UserController@getPassword')->name('password.change');

Route::post('/admin/password/change', 'UserController@postPassword')->name('password.change');




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
Route::get('properties/view', 'PropertiesController@view')->name('properties.view');
Route::get('properties/{properties}', 'PropertiesController@show')->name('properties.views');

// Plot
Route::resource('plot', 'PlotController');
Route::get('/view', 'PlotController@view')->name('plot.view');
Route::get('/view/{id}', 'PlotController@view')->name('plot.view');
Route::get('/plot/{plot}', 'PlotController@change')->name('plot.change');
Route::get('/plot/search/{search}', 'PlotController@search');

// Orders
Route::resource('orders', 'OrdersController');
Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
Route::get('/consent', 'OrdersController@consent')->name('orders.consent');
// Route::get('/manage', 'OrdersApiController@manage')->name('orders.edit');
Route::get('/admin/Add/order', 'OrdersController@create')->name('orders.create');
Route::get('/admin/myorders', 'OrdersController@myOrders')->name('orders.myorders');
Route::get('/admin/myorders/{id}', 'OrdersController@approve')->name('orders.approve');
Route::get('/orders/reject/{id}', 'OrdersController@reject')->name('orders.reject');
Route::get('/orders/delivered/{id}', 'OrdersController@delivered')->name('orders.delivered');
Route::get('/orders/ready/{id}', 'OrdersController@ready')->name('orders.ready');
Route::get('/Edit/order/{order}', 'OrdersController@edit')->name('orders.edit');
// Route::get('/modify-order/{id}', 'OrdersController@modify')->name('orders.modify');
Route::get('/search', [UserController::class, 'index']);

// The Client Part
Route::get('/clients', 'ClientController@client')->name('clients.index');
Route::get('client/create', 'ClientController@create')->name('clients.create');
Route::get('/client/{id}', 'ClientController@view')->name('clients.view');
Route::get('/client', 'ClientController@myClient')->name('clients.myClient');
Route::get('/client/site-visit/{id}', 'ClientController@siteVisit')->name('clients.siteVisit');
Route::get('/client/alkalo/{id}', 'ClientController@alkalo')->name('clients.alkalo');
Route::get('/client/sketch-plan/{id}', 'ClientController@sketchPlan')->name('clients.sketchPlan');
Route::get('/client/physical-plan/{id}', 'ClientController@physicalPlan')->name('clients.physicalPlan');
Route::get('/client/area-council/{id}', 'ClientController@areaCouncil')->name('clients.areaCouncil');
Route::get('/client/chief-approval/{id}', 'ClientController@chiefApproval')->name('clients.chiefApproval');
Route::get('/client/capital-gains/{id}', 'ClientController@capitalGains')->name('clients.capitalGains');
Route::get('/client/dhl-pickup/{id}', 'ClientController@dhlPickup')->name('clients.dhlPickup');
Route::get('/getStates/{id}','ClientController@getStates');
Route::get('/getCities/{id}','ClientController@getCities');

// Contact Us Route
Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store', 'uses'=>'ContactUsController@contactSaveData']);