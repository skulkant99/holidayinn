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
Route::get('/gallery','GalleryController@index');

Route::get('/question',function () {
    $data['social'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','H')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
    $data['logo'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','F')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
    $data['kids'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','K')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
    return view('question',$data);
});

Route::get('/faq','QuestionController@index');
Route::get('/seach','QuestionController@seach');
Route::post('/AddQuestion','QuestionController@store');

Route::get('SearchAll/','SearchController@search');
Route::post('/search','SearchController@search');
// Route::post('/search',function () {
//     return view('search');
// });
Route::post('/comment','CommentController@store');

Route::get('/contact','ContactController@index');
Route::post('/AddContact','ContactController@store');
// Route::get('/contact',function () {
//     return view('contact');
// });
Route::get('/fullcomment','PolicyController@full_policy');
// Route::get('/fullcomment',function () {
//     return view('fullcomment');
// });
Route::get('/ourcomment','PolicyController@out_policy');
// Route::get('/ourcomment',function () {
//     return view('ourcomment');
// });
Route::get('/privacy','PolicyController@policy');
Route::get('offer_inside/{id}','ContentController@detail');

Route::post('/Createuser','RegisterController@store');
Route::get('/ActivateEmail/{token}','RegisterController@ActivateEmail');
Route::post('/FormRespassword','CheckController@FormRespassword');
Route::get('/Repassword/{token}','CheckController@Repassword');
Route::post('/updatepassword','CheckController@updatepassword');

Route::post('/Subscrice','RegisterController@subscrice');

Route::get('/cf-password',function () {
    $data['social'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','H')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
    $data['logo'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','F')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
    $data['kids'] = \App\Models\Social::where('status','=','1')
            ->where('type','=','K')
            ->select('socials.*')
            ->orderBy('sort_id','ASC')
            ->get();
    return view('forgetpassword',$data);
});

Route::post('/Addlike','ContentController@Countlike');

Route::get('/sitemap','SitemapController@index');
