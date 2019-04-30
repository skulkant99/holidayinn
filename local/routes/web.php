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
Route::post('/CheckLogin', 'AuthController@CheckLogin');
Route::get('/logout', 'AuthController@logout');
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/','HomeController@index');
Route::get('/gallery','GAlleryController@index');

Route::get('/question',function () {
    return view('question');
});

Route::get('/faq','QuestionController@index');
// Route::get('/seach','QuestionController@seach');
Route::post('/AddQuestion','QuestionController@store');

Route::get('/seach','SeachController@seach');
// Route::get('/faq',function () {
//     return view('faq');
// });
Route::post('/comment','CommentController@store');

Route::get('/contact',function () {
    return view('contact');
});
Route::get('/fullcomment',function () {
    return view('fullcomment');
});
Route::get('/ourcomment',function () {
    return view('ourcomment');
});
Route::get('offer_inside/{id}','ContentController@detail');

Route::post('/Createuser','RegisterController@store');
Route::get('/ActivateEmail/{token}','RegisterController@ActivateEmail');
Route::post('/FormRespassword','CheckController@FormRespassword');
Route::get('/Repassword/{token}','CheckController@Repassword');
Route::post('/updatepassword','CheckController@updatepassword');

Route::get('/cf-password',function () {
    return view('forgetpassword');
});
