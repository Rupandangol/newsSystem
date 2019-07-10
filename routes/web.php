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
//*/
//Route::get('/','crud@index');
//Route::post('/','crud@add')->name('addData');


//Backend
//News web
Route::group(['prefix' => '/@admin@'], function () {


    //login


    Route::get('/login', 'loginController@login')->name('login-admin');
    Route::post('/loginAction', 'loginController@loginAction')->name('login-Action');
    Route::any('/logout', 'loginController@logout')->name('logout');


    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'newsController@index')->name('dashboard');


        //category
        Route::get('/addCategory', 'newsController@addCategory');
        Route::post('/addCategory/actionCategory', 'newsController@addCategoryAction');
        Route::get('/manageCategory', 'newsController@manageCategory');
        Route::get('/manageCategory/deleteCategory/{id}', 'newsController@deleteCategory')->name('delete-category');
        Route::get('/manageCategory/updateCategory/{id}', 'newsController@updateCategory');
        Route::post('/manageCategory/updateCategory/updateCategoryAction', 'newsController@updateCategoryAction');


        //News
        Route::get('/addNews', 'newsController@addNews');
        Route::post('/addNews/addNewsAction', 'newsController@addNewsAction');
        Route::get('/manageNews', 'newsController@manageNews');
        Route::get('/manageNews/deleteNews/{id}', 'newsController@deleteNews');
        Route::get('/manageNews/editNews/{id}', 'newsController@editNews');
        Route::post('/manageNews/editNewsAction', 'newsController@editNewsAction');


        //admin
        Route::get('/addAdmin', 'adminController@addAdmin');
        Route::post('/addAdmin', 'adminController@addAdminAction');
        Route::get('/manageAdmin', 'adminController@manageAdmin');
        Route::group(['prefix' => 'manageAdmin'], function () {
            Route::get('/deleteAdmin/{id}', 'adminController@deleteAdmin');
            Route::get('/updateAdmin/{id}', 'adminController@updateAdmin');
            Route::post('/updateAdminAction', 'adminController@updateAdminAction');
        });


//        user
        Route::get('/addUser', 'userController@addUser');
        Route::post('/addUser/addUserAction', 'userController@addUserAction');
        Route::get('/manageUser', 'userController@manageUser');
        Route::get('/manageUser/deleteUser/{id}', 'userController@deleteUser');
        Route::get('/manageUser/updateUser/{id}', 'userController@updateUser');
        Route::post('/manageUser/updateUserAction', 'userController@updateUserAction');
    });


});

//end of backend


//frontend
Route::get('/', 'frontendController@index');
Route::get('/page/{page?}/{id?}', 'frontendController@process');
//        search
Route::post('/searchNews', 'searchNewsController@search')->name('search-news');


//login

Route::get('/signIn', 'frontendLoginController@signin')->name('user-signIn');
Route::get('/signUp', 'frontendLoginController@signup');

Route::post('/signIn/signInAction', 'frontendLoginController@signInAction');
Route::get('/singIn/userLogout', 'frontendLoginController@userLogout')->name('user-logout');


Route::group(['prefix' => 'user', 'middleware' => 'auth:subscriber'], function () {
    //user interface
    Route::get('/', 'userController@dashboard')->name('userDash');
    Route::get('/category/{category}/{id}', 'userController@categoryPage');
    Route::get('/News/{id}', 'userController@viewPage');
    Route::get('/all', 'userController@userAll');

//userSearch
    Route::get('/search', 'userController@search');

//    rating
    Route::get('/api/rating','ajaxController@rating');
});
