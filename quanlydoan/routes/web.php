<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\GroupScheduel;
use App\ContentGroupScheduel;
use App\Group;
use App\Student;
use App\GroupStudent;
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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/', function() {
		return view('admin.home');
	});
});


// Route::group(['prefix'=>'student'], function(){
// 	Route::get('listProject', 'StudentController@getListProject');
// });

Route::group(['prefix' => 'student'], function() {
	Route::get('/', function() {
		return view('student.listProject');
	});
	Route::get('document', function() {
		return view('student.evaluate');
	});

	Route::post('/', 'ProjectController@getListProject');
	Route::get('/project/{id_group}', 'ProjectController@getProjectDetail');

});



// Route for teacher
Route::group(['prefix' => 'teacher'], function() {

	Route::get('/', function() {
		return view('teacher.listProject');
	});

	Route::group(['prefix' => 'project'], function() {
		Route::get('/{id_group}', 'ProjectController@getProjectDetail');

		// Route for scheduel
		Route::get('/{id_group}/scheduel', 'ScheduelController@getScheduel');
		Route::post('/{id_group}/scheduel', 'ScheduelController@addScheduelContent');
		// Route::get('/{id_group}/scheduel/delete/{id_content}', 'ScheduelController@delScheduelContent');
		Route::post('/{id_group}/scheduel/delete', 'ScheduelController@delScheduelContent');
		Route::get('/{id_group}/scheduel/update/{id_content}', 'ScheduelController@getUpdateScheduelContent');
		Route::post('/{id_group}/scheduel/update/{id_content}', 'ScheduelController@postUpdateScheduelContent');
	
		// Route for evaluation
		Route::get('/{id_group}/evaluation', 'EvaluationController@getEvaluation');
		Route::post('/{id_group}/evaluation', 'EvaluationController@addEvaluation');
		// Route::get('/{id_group}/evaluation/delete/{id}', 'EvaluationController@delEvaluation');
		Route::post('/{id_group}/evaluation/delete', 'EvaluationController@delEvaluation');
		Route::get('/{id_group}/evaluation/update/{id}', 'EvaluationController@getUpdateEvaluation');
		Route::post('/{id_group}/evaluation/update/{id}', 'EvaluationController@postUpdateEvaluation');

		// Route for listStudent
		Route::get('/{id_group}/listStudent', 'StudentOfGroupController@getListStudent');
		Route::post('/{id_group}/listStudent', 'StudentOfGroupController@addStudentOfGroup');
		// Route::get('/{id_group}/listStudent/delete/{id}', 'StudentOfGroupController@delStudentOfGroup');
		Route::post('/{id_group}/listStudent/delete', 'StudentOfGroupController@delStudentOfGroup');

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


// Route::get('/a', function () {
// 	$student = DB::table('student')->join('user', 'user.username', '=', 'student.username')
//                             ->select( 'student.id_student')
//                             ->where('student.username', '=', 20152023)
// 							->get();
// 	// var_dump($student);
// 	// $data = array(
// 	// 	'student' => $student
// 	// );
// 	// echo($data['student']);
// 	foreach ($student as $a) {
// 		echo($a->id_student);
// 		# code...
// 	}
// 		// $student_group = new GroupStudent();
// 		// $student_group->id_group = 2;
//         // $student_group->id_student = 1;
//         // $student_group->save();
// });
