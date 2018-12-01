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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/', function() {
		return view('admin.home');
	});
});

Route::group(['prefix' => 'student', 'namespace' => 'Student'], function() {
	Route::get('/', function() {
		return view('student.home');
	});
});
Route::group(['prefix' => 'teacher', 'namespace' => 'Student'], function() {
	Route::get('/', function() {
		return view('teacher.home');
	});
});
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'project'], function(){
		Route::get('listProject', 'ListProjectController@getListProject');

	});

	Route::group(['prefix'=>'scheduel'], function(){
		// chua co
		Route::get('show', 'AdScheduelController@getScheduel');

		Route::get('update', 'SubjectScheduelController@getUpdate');
	});

	Route::group(['prefix'=>'user'], function(){
		// danh sach user
		Route::get('listAdmin', 'AdUserController@getListAdmin');
		Route::post('listAdmin/search', 'AdUserController@postSearch');
		Route::get('listTeacher', 'AdTeacherController@getListTeacher');
		Route::post('listTeacher/search', 'AdTeacherController@postSearch');
		Route::get('listStudent', 'AdStudentController@getListStudent');
		Route::post('listStudent/search', 'AdStudentController@postSearch');

		//sua thong tin user
		Route::get('updateAdmin/{username}', 'AdUserController@getUpdateAdmin');
		Route::post('updateAdmin/{username}', 'AdUserController@postUpdateAdmin');
		Route::get('updateTeacher/{id_teacher}', 'AdTeacherController@getUpdateTeacher');
		Route::post('updateTeacher/{id_teacher}', 'AdTeacherController@postUpdateTeacher');
		Route::get('updateStudent/{id_student}', 'AdStudentController@getUpdateStudent');
		Route::post('updateStudent/{id_student}', 'AdStudentController@postUpdateStudent');

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
		Route::get('deleteTeacher/{id_teacher}', 'AdTeacherController@getDeleteTeacher');
		Route::get('deleteStudent/{id_student}', 'AdStudentController@getDeleteStudent');

	});
});
