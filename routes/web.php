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

Route::redirect('/', 'schools');

Route::get('ists', 'SchoolIstsController@index')->name('school-ists.index');
Route::get('school/{school}/ists', 'SchoolIstsController@show')->name('school-ists.show');
Route::post('schools/{school}/ists', 'SchoolIstsController@import')->name('school-ists.import');
Route::get('school/{school}/ists/export', 'SchoolIstsController@export')->name('school-ists.export');
Route::get('school/{school}/ists/download', 'SchoolIstsController@download')->name('school-ists.download');
Route::get('school/{school}/ists/download-list', 'SchoolIstsController@showDownloadList')->name('school-ists.download-list');

Route::get('rmibs', 'SchoolRmibsController@index')->name('school-rmibs.index');
Route::get('school/{school}/rmibs', 'SchoolRmibsController@show')->name('school-rmibs.show');
Route::post('schools/{school}/rmibs', 'SchoolRmibsController@import')->name('school-rmibs.import');
Route::get('school/{school}/rmibs/download', 'SchoolRmibsController@download')->name('school-rmibs.download');
Route::get('school/{school}/rmibs/download-list', 'SchoolRmibsController@showDownloadList')->name('school-rmibs.download-list');

Route::delete('schools/{school}/reset', 'SchoolsController@reset')->name('schools.reset');
Route::resource('schools', 'SchoolsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
