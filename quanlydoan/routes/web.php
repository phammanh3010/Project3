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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/listTeacher', function () {
    return view('pages.listTeacher');
});

Route::get('/listProject', function () {
    return view('pages.listProject');
});

Route::get('/createProject', function () {
    return view('pages.createProject');
});

Route::get('/projectDetail', function () {
    return view('pages.projectDetail');
});

Route::get('/profileStudent', function () {
    return view('pages.profileStudent');
});

Route::get('/profileTeacher', function () {
    return view('pages.profileTeacher');
});

Route::get('/teacherDetail', function () {
    return view('pages.teacherDetail');
});

Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'project'], function(){
		Route::get('listProject', 'ListProjectController@getListProject');

	});

	Route::group(['prefix'=>'scheduel'], function(){
		// chua co
		Route::get('create', 'SubjectScheduelController@getCreate');

		Route::get('update', 'SubjectScheduelController@getUpdate');
	});

	Route::group(['prefix'=>'user'], function(){
		// danh sach user
		Route::get('listAdmin', 'AdUserController@getListAdmin');
		Route::get('listTeacher', 'AdUserController@getListTeacher');
		Route::get('listStudent', 'AdUserController@getListStudent');

		//sua thong tin user
		Route::get('updateAdmin/{username}', 'AdUserController@getUpdateAdmin');
		Route::post('updateAdmin/{username}', 'AdUserController@postUpdateAdmin');
		Route::get('updateTeacher/{id}', 'AdUserController@getUpdateTeacher');
		Route::get('updateStudent/{id}', 'AdUserController@getUpdateStudent');

		// them user
		// Route::get('addAdmin', 'AdUserController@getAddAdmin');
		//dang can sua cho search de xuong duoi form, dung ajax de search
		Route::post('addOrSearch', 'AdUserController@postAddOrSearch');
		Route::get('addTeacher', 'AdUserController@getAddTeacher');
		Route::post('addTeacher', 'AdUserController@postAddTeacher');
		Route::get('addStudent', 'AdUserController@getAddStudent');
		Route::post('addStudent', 'AdUserController@postAddStudent');

		//tim kiem user
		Route::get('searchAdmin', 'AdUserController@getSearchAdmin');
		Route::get('searchTeacher', 'AdUserController@getSearchTeacher');
		Route::get('searchStudent', 'AdUserController@getSearchStudent');

		//xoa user
		Route::get('deleteAdmin/{username}', 'AdUserController@getDeleteAdmin');
		Route::get('deleteTeacher', 'AdUserController@getDeleteTeacher');
		Route::get('deleteStudent', 'AdUserController@getDeleteStudent');

	});
});