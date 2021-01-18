<?php

//use Illuminate\Support\Facades\Route;

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

//Route::get("/", "HomeController@index")->name("home");
Route::get("", "HomeController@index")->name("home");
Route::get("/register", "RegisterController@index")->name("register");
Route::get("/login", "RegisterController@login")->name("login");
Route::get("/logout", 'RegisterController@logout')->name('logout');
Route::post("/postlogin", "RegisterController@postlogin")->name("postlogin");
Route::post('register', 'RegisterController@postregister')->name('postRegister');



Route::get('/verify/{token}', 'RegisterController@verify')->name('verify');

Route::get('/crevent', 'EventController@index')->name('crevent')->middleware('auth');
Route::post('/postcrevent', "EventController@postcreate")->name('postcrevent')->middleware('auth');
Route::get('/event/{token}', "EventController@show")->name('eventshow');
//Route::get('/invite/{token}', "EventController@invite")->name('invite');
Route::post('/invite', "EventController@invite")->name('invite');
Route::get('/share/{uuid}', "EventController@shareinvite")->name('share');
Route::get('/invitedecision/{values}/{uuid}', "EventController@inviteDecision")->name("inviteDecision");
Route::get('/imprint', 'HomeController@imprint')->name('imprint');
Route::get('/report', 'HomeController@report')->name('report');

Route::get('/usersettings', 'UserController@settings')->name('usersettings');
Route::post('/useraudit', "UserController@useraudit")->name('useraudit');
//Route::post("/userdelete", "UserController@delete")->name('userdelete');
//Route::post("/userupdate", "UserController@update")->name("userupdate");

Route::get('/adminpanel', "AdminController@index")->name('adminpanel')->middleware('admin');






/*Route::post("/register", "Auth\RegisterController@create")->name('createMail');
Route::get("/userVerify/{id}", "Auth\RegisterController@verify")->name('userVerify');

Route::post("userUnsub/{id}", "Auth\RegisterController@blacklistMail")->name("unsubscribeMail");*/

//Route::get("/whoweare", "HomeController@whoweare")->name("whoweare");
