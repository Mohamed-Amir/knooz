<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

header('Content-Type: application/json; charset=UTF-8', true);


Route::post('/massage', 'Fronted\Contact_usController@form')->name('contact_us.form');

Route::post('/News', 'Fronted\GeneralController@News')->name('letter.News');
Route::post('/massage', 'Fronted\GeneralController@massage')->name('letter.massage');


Route::prefix('About')->group(function () {
    Route::get('/About_us', 'Api\AboutController@About_us')->name('About.About_us');
});