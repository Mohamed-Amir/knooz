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
Route::group(['prefix' => LaravelLocalization::setLocale(),

    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {






    Route::get('/', function () {
    $current =1;
    return view('home',compact('current'));
});
/** General pages */
Route::get('/about', 'GeneralController@about')->name('General.about');
Route::get('/contact_us', 'GeneralController@contact_us')->name('General.contact_us');



/**product*/
Route::get('/products/{id}', 'ProductController@products')->name('product.products');
Route::get('/allProducts', 'ProductController@allProducts')->name('product.allProducts');
Route::get('/singleProduct/{id}', 'ProductController@singleProduct')->name('Projects.singleProduct');




/**Projects*/
Route::get('/allProjects', 'ProjectsController@allProjects')->name('Projects.allProjects');
Route::get('/singleProject/{id}', 'ProjectsController@singleProject')->name('Projects.singleProject');
});