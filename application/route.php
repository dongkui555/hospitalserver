<?php


use think\Route;

Route::get('api/:version/banner','api/:version.Banner/getBanner');
Route::get('api/:version/index','api/:version.Banner/index');
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/discount','api/:version.Discount/getDiscount');
Route::get('api/:version/category/all','api/v1.Category/getCategoryAll');

Route::post('api/:version/token/user','api/:version.Token/getToken');
Route::post('api/:version/token/verify','api/:version.Token/verifyToken');

//Route::group('api/:version/cases',function(){
    Route::get('api/:version/cases/by_category','api/:version.Cases/getAllInCategory');
    Route::get('api/:version/cases/:id','api/:version.Cases/getCasesOne');
//});

Route::post('api/:version/order/place','api/:version.Order/placeOrder');

