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
Auth::routes();

//Only Admin routes

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
	Route::get('/', 'AdminController@index');
    Route::get('/create-page','PageController@create');
    Route::post('/store-page','PageController@store');
    Route::get('/all-pages','PageController@getPages');
    Route::get('/edit-page/{page}','PageController@edit');
    Route::post('/update-page/{page}','PageController@update');
    Route::get('/orders','OrderController@allOrders');
    Route::get('/order/{order}','OrderController@adminShow');
    Route::post('/order/update-assigned/{order}','OrderController@updateAssigned');
    Route::post('/order/update-completed/{order}','OrderController@updateCompleted');
    Route::get('/reviews','ReviewController@adminIndex');
    Route::post('/update-review','ReviewController@update');
    Route::get('/settings','SettingController@index');
    Route::post('/setting-store','SettingController@store');
    Route::get('/invoices','InvoiceController@index');
});

Route::get('/','PageController@index');

Route::get('/order-now','OrderController@create');
Route::post('/order-now','OrderController@store');
Route::get('/my-orders','OrderController@index');
Route::get('/success','PaymentController@success');
Route::get('/cancel','PaymentController@cancel');
Route::get('/preview/{order}','OrderController@preview');
Route::get('/edit-order/{order}','OrderController@edit');
Route::post('/update-order/{order}','OrderController@update');
Route::get('/order/{order}','OrderController@show');
Route::get('/delete-file/{id}','OrderfileController@destroy');
Route::post('/message/send-message','MessageController@store');
Route::post('/order','PageController@getOrder');
Route::get('/reviews','ReviewController@index');
Route::post('/store-review','ReviewController@store');
Route::get('/contact-us','PageController@contactIndex') ;
Route::post('/contact-us','PageController@contactStore');
Route::get('/faq','PageController@faq');
Route::get('/sitemap.xml','PageController@sitemap');
Route::get('/home',function(){
	return redirect('/my-orders');
});
Route::get('/gin','InvoiceController@index');
Route::post('/gin','InvoiceController@store');
Route::get('/custom-order/{encryptVal}','InvoiceController@show');
Route::get('/{slug}','PageController@show');
