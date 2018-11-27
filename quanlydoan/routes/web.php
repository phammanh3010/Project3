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
		Route::get('listTeacher', 'AdTeacherController@getListTeacher');
		Route::get('listStudent', 'AdStudentController@getListStudent');

		//sua thong tin user
		Route::get('updateAdmin/{username}', 'AdUserController@getUpdateAdmin');
		Route::post('updateAdmin/{username}', 'AdUserController@postUpdateAdmin');
		Route::get('updateTeacher/{id}', 'AdTeacherController@getUpdateTeacher');
		Route::get('updateStudent/{id}', 'AdStudentController@getUpdateStudent');

		// them user
		// Route::get('addAdmin', 'AdUserController@getAddAdmin');
		//dang can sua cho search de xuong duoi form, dung ajax de search
		Route::post('addAdmin', 'AdUserController@postAddAdmin');
		Route::post('addTeacher', 'AdTeacherController@postAddTeacher');
		Route::post('addStudent', 'AdStudentController@postAddStudent');

		//tim kiem user
		Route::get('searchAdmin', 'AdUserController@getSearchAdmin');
		Route::get('searchTeacher', 'AdTeacherController@getSearchTeacher');
		Route::get('searchStudent', 'AdStudentController@getSearchStudent');

		//xoa user
		Route::get('deleteAdmin/{username}', 'AdUserController@getDeleteAdmin');
		Route::get('deleteTeacher/{id}', 'AdTeacherController@getDeleteTeacher');
		Route::get('deleteStudent/{id}', 'AdStudentController@getDeleteStudent');

	});
});