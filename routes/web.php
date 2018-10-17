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
Route::get('schools/{school}/ists', 'SchoolIstsController@show')->name('school-ists.show');
Route::post('schools/{school}/ists', 'SchoolIstsController@import')->name('school-ists.import');
Route::get('schools/{school}/ists/export', 'SchoolIstsController@export')->name('school-ists.export');
Route::get('schools/{school}/ists/download', 'SchoolIstsController@download')->name('school-ists.download');

Route::get('rmibs', 'SchoolRmibsController@index')->name('school-rmibs.index');
Route::get('schools/{school}/rmibs', 'SchoolRmibsController@show')->name('school-rmibs.show');
Route::post('schools/{school}/rmibs', 'SchoolRmibsController@import')->name('school-rmibs.import');
Route::get('schools/{school}/rmibs/download', 'SchoolRmibsController@download')->name('school-rmibs.download');
Route::post('schools/{school}/rmib-ist', 'SchoolRmibsController@importIstRecap')->name('school-rmibs.import-ist-recap');

Route::get('mbti-epps-ls', 'SchoolMbtiEppsLssController@index')->name('school-mels.index');
Route::get('schools/{school}/mbti-epps-ls', 'SchoolMbtiEppsLssController@show')->name('school-mels.show');
Route::post('schools/{school}/mbti-epps-ls', 'SchoolMbtiEppsLssController@import')->name('school-mels.import');
Route::get('schools/{school}/mbti-epps-ls/download/{test}', 'SchoolMbtiEppsLssController@download')->name('school-mels.download');

Route::get('students', 'SchoolStudentsController@index')->name('school-students.index');
Route::get('schools/{school}/students', 'SchoolStudentsController@show')->name('school-students.show');
Route::get('schools/{school}/students/download', 'SchoolStudentsController@download')->name('school-students.download');

Route::delete('schools/{school}/reset', 'SchoolsController@reset')->name('schools.reset');
Route::resource('schools', 'SchoolsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
