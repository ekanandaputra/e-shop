<?php

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


// ADMIN ROUTE
// ----------- Login
Route::get('/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
// ----------- Product
Route::get('/admin/product', 'adminProductController@showProduct')->name('admin.product');
Route::get('/admin/add/product', 'adminProductController@showForm')->name('admin.add.product');
Route::post('/admin/add/product', 'adminProductController@saveProduct')->name('admin.add.product.submit');
Route::get('/admin/edit/product/{product_id}', 'adminProductController@showEditForm')->name('admin.edit.product');
Route::post('/admin/edit/product/{product_id}', 'adminProductController@edit')->name('admin.edit.product.submit');
Route::get('/admin/delete/product/{product_id}', 'adminProductController@delete')->name('admin.delete.product');
// ----------- Order
Route::get('/admin/order', 'adminOrderController@showOrder')->name('admin.order');
Route::get('/admin/show/order/{order_id}', 'adminOrderController@orderDetail')->name('admin.order.detail');
Route::post('/admin/change_status/order/{order_id}', 'adminOrderController@changeStatus')->name('admin.order.changestatus');
// ----------- Notif
Route::get('/admin/notif', 'adminNotifController@showNotif')->name('admin.notif');


// USER ROUTE
// ----------- Login
//Route::get('/login', 'Auth\LoginController@showAdminLoginForm');
Auth::routes(['verify' => true]);
// ----------- Fungsi
Route::get('/', 'userController@listProduct');
Route::get('/list-product', 'userController@listProduct');
Route::get('/detail-product/{product_id}', 'userController@detailProduct');
Route::post('/save-product', 'userController@saveProduct')->name('save.product');
Route::get('/cart', 'userController@cart');
Route::post('/order', 'userController@order')->name('order');
Route::get('/kirim-email', 'userController@kirimEmail');
Route::get('/list-order', 'userController@listOrder');
Route::get('/detail-order/{order_id}', 'userController@detailOrder');
Route::post('/upload-payment', 'userController@uploadPayment')->name('upload.payment');