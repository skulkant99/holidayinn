<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login', 'Admin\AuthController@login');

Route::post('/admin/CheckLogin', 'Admin\AuthController@CheckLogin');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});

Route::group(['middleware' => 'admin_auth', 'prefix' => 'admin'], function() {
    Route::get('/', 'Admin\HomeController@index');
    Route::get('/logout', 'Admin\AuthController@logout');
    Route::get('/dashboard', 'Admin\HomeController@index');

    Route::post('/upload_file', 'Admin\UploadFileController@index');



    //User
    Route::get('/change_password', 'Admin\UserController@change_password');
    Route::get('/profile', 'Admin\UserController@profile');
    Route::get('/user/ListUser', 'Admin\UserController@ListUser');
    Route::post('/user/change_password', 'Admin\UserController@change_password');
    Route::post('/user/checkedit/{id}', 'Admin\UserController@update');
    Route::post('/user/delete/{id}', 'Admin\UserController@destroy');
    Route::resource('/user', 'Admin\UserController');
    // Route::get('/user', 'Admin\UserController@index');
    Route::get('/logout', 'Admin\AuthController@logout');

    //ManageMenu
    Route::get('/ManageMenu', 'Admin\MenuController@index');
    Route::get('/menu/ListMenu', 'Admin\MenuController@ListMenu');
    Route::post('/menu', 'Admin\MenuController@store');
    Route::get('/menu/{id}', 'Admin\MenuController@edit');
    Route::post('/menu/checkedit/{id}', 'Admin\MenuController@update');
    Route::post('/menu/delete/{id}', 'Admin\MenuController@destroy');

    //SetPermission
    Route::post('/SetPermission', 'Admin\MenuController@SetPermission');
    Route::post('/GetPermission/{id}', 'Admin\MenuController@GetPermission');

    Route::get('/Install', 'Admin\InstallController@index');
    Route::get('/Install/DefaultView', 'Admin\InstallController@DefaultView');
    Route::post('/Install/GetFieldDropDown', 'Admin\InstallController@GetFieldDropDown');
    Route::post('/Install/GetField/{table}', 'Admin\InstallController@GetField');
    Route::post('/Install', 'Admin\InstallController@Install');

    Route::get('/Menu', 'Admin\MenuController@index');
    Route::get('/Menu/Lists', 'Admin\MenuController@Lists');
    Route::post('/Menu', 'Admin\MenuController@store');
    Route::get('/Menu/{id}', 'Admin\MenuController@show');
    Route::post('/Menu/{id}', 'Admin\MenuController@update');
    Route::post('/Menu/Delete/{id}', 'Admin\MenuController@destroy');

    Route::get('/AdminUser', 'Admin\AdminUserController@index');
    Route::get('/AdminUser/Lists', 'Admin\AdminUserController@Lists');
    Route::post('/AdminUser', 'Admin\AdminUserController@store');
    Route::post('/AdminUser/change_password', 'Admin\AdminUserController@change_password');
    Route::get('/AdminUser/{id}', 'Admin\AdminUserController@show');
    Route::post('/AdminUser/{id}', 'Admin\AdminUserController@update');
    Route::post('/AdminUser/Delete/{id}', 'Admin\AdminUserController@destroy');

    Route::get('/banner','Admin\BannerController@index');
    Route::get('/banner/Lists','Admin\BannerController@Lists');
    Route::post('/banner','Admin\BannerController@store');
    Route::get('/banner/show/{id}','Admin\BannerController@show');
    Route::post('/banner/{id}','Admin\BannerController@update');
    Route::post('/banner/Delete/{id}','Admin\BannerController@destroy');

    Route::get('/information','Admin\InformationController@index');
    Route::get('/information/Lists','Admin\InformationController@Lists');
    Route::post('/information','Admin\InformationController@store');
    Route::get('/information/show/{id}','Admin\InformationController@show');
    Route::post('/information/{id}','Admin\InformationController@update');
    Route::post('/information/Delete/{id}','Admin\InformationController@destroy');

    Route::get('/contact','Admin\ContactController@index');
    Route::get('/contact/Lists','Admin\ContactController@Lists');
    Route::post('/contact','Admin\ContactController@store');
    Route::get('/contact/show/{id}','Admin\ContactController@show');
    Route::post('/contact/{id}','Admin\ContactController@update');
    Route::post('/contact/Delete/{id}','Admin\ContactController@destroy');

      Route::get('/GalleryType', 'Admin\GalleryTypeController@index');
        Route::get('/GalleryType/Lists', 'Admin\GalleryTypeController@Lists');
        Route::post('/GalleryType', 'Admin\GalleryTypeController@store');
        Route::get('/GalleryType/{id}', 'Admin\GalleryTypeController@show');
        Route::post('/GalleryType/{id}', 'Admin\GalleryTypeController@update');
        Route::post('/GalleryType/Delete/{id}', 'Admin\GalleryTypeController@destroy');

      Route::get('/Gallery', 'Admin\GalleryController@index');
        Route::get('/Gallery/Lists', 'Admin\GalleryController@Lists');
        Route::post('/Gallery', 'Admin\GalleryController@store');
        Route::get('/Gallery/{id}', 'Admin\GalleryController@show');
        Route::post('/Gallery/{id}', 'Admin\GalleryController@update');
        Route::post('/Gallery/Delete/{id}', 'Admin\GalleryController@destroy');

      Route::get('/Question', 'Admin\QuestionController@index');
        Route::get('/Question/Lists', 'Admin\QuestionController@Lists');
        Route::post('/Question', 'Admin\QuestionController@store');
        Route::get('/Question/{id}', 'Admin\QuestionController@show');
        Route::post('/Question/{id}', 'Admin\QuestionController@update');
        Route::post('/Question/Delete/{id}', 'Admin\QuestionController@destroy');

      Route::get('/Answer', 'Admin\AnswerController@index');
      Route::get('/Question/Answer/{id}','Admin\AnswerController@Answer');
        Route::get('/Answer/Lists', 'Admin\AnswerController@Lists');
        Route::post('/Answer', 'Admin\AnswerController@store');
        Route::get('/Answer/{id}', 'Admin\AnswerController@show');
        Route::post('/Answer/{id}', 'Admin\AnswerController@update');
        Route::post('/Answer/Delete/{id}', 'Admin\AnswerController@destroy');

       

      Route::get('/HelpType', 'Admin\HelpTypeController@index');
        Route::get('/HelpType/Lists', 'Admin\HelpTypeController@Lists');
        Route::post('/HelpType', 'Admin\HelpTypeController@store');
        Route::get('/HelpType/{id}', 'Admin\HelpTypeController@show');
        Route::post('/HelpType/{id}', 'Admin\HelpTypeController@update');
        Route::post('/HelpType/Delete/{id}', 'Admin\HelpTypeController@destroy');

      Route::get('/ContactHelp', 'Admin\ContactHelpController@index');
        Route::get('/ContactHelp/Lists', 'Admin\ContactHelpController@Lists');
        Route::post('/ContactHelp', 'Admin\ContactHelpController@store');
        Route::get('/ContactHelp/{id}', 'Admin\ContactHelpController@show');
        Route::post('/ContactHelp/{id}', 'Admin\ContactHelpController@update');
        Route::post('/ContactHelp/Delete/{id}', 'Admin\ContactHelpController@destroy');

      Route::get('/Category', 'Admin\CategoryController@index');
        Route::get('/Category/Lists', 'Admin\CategoryController@Lists');
        Route::post('/Category', 'Admin\CategoryController@store');
        Route::get('/Category/{id}', 'Admin\CategoryController@show');
        Route::post('/Category/{id}', 'Admin\CategoryController@update');
        Route::post('/Category/Delete/{id}', 'Admin\CategoryController@destroy');

      Route::get('/Policy', 'Admin\PolicyController@index');
        Route::get('/Policy/Lists', 'Admin\PolicyController@Lists');
        Route::post('/Policy', 'Admin\PolicyController@store');
        Route::get('/Policy/{id}', 'Admin\PolicyController@show');
        Route::post('/Policy/{id}', 'Admin\PolicyController@update');
        Route::post('/Policy/Delete/{id}', 'Admin\PolicyController@destroy');

      Route::get('/Ourpolicy', 'Admin\PolicyController@ourpolicy');
        Route::get('/Ourpolicy/ListsOurpolicy', 'Admin\PolicyController@ListsOurpolicy');

      Route::get('/Information/Comment/{id}','Admin\CommentController@Comment');
        Route::get('/information/ListsComment','Admin\CommentController@ListsComment');
        Route::post('/Comment','Admin\CommentController@store');
        Route::get('/Comment/show/{id}','Admin\CommentController@show');
        Route::post('/Comment/{id}','Admin\CommentController@update');
        Route::post('/Comment/Delete/{id}','Admin\CommentController@destroy');
      ##ROUTEFORINSTALL##
});
//OrakUploader
Route::any('/upload_file', 'OrakController@upload_file');
