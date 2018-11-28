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

Route::get('/', 'IndexController@index')->name('index');

Route::post('/warehouseA', 'IndexController@show_warehouse_a');
Route::post('/warehouseB', 'IndexController@show_warehouse_b');
Route::post('/warehouseQuantity', 'IndexController@show_quantity_gr_five');
Route::post('/warehousePrice', 'IndexController@show_price_gr_ten');

Route::get('/item/{item}', 'IndexController@show');
Route::post('/item', 'IndexController@processForm')->name('itemShow');

Route::delete('item/delete/{item}', function ($item){
    $item = \App\Item::find($item);

    $item->delete();

    return redirect('/');

});
