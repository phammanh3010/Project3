<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\GroupScheduel;
use App\ContentGroupScheduel;
use App\ContentSubjectScheduel;
use App\SubjectScheduel;
use App\Group;
use App\Student;
use App\GroupStudent;
use App\EvalutionCriteria;
use Carbon\Carbon;

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


Route::get('/a', function () {
		$semester = Group::find(5)->value('semester');
        $subject = Group::find(5)->value('id_subject');
        if($subject < 4) {
            $scheduel_contents = DB::table('group')->join('group_scheduel', 'group.id_group', '=', 'group_scheduel.id_group')
                ->join('content_group_scheduel', 'group_scheduel.id_scheduel', '=', 'content_group_scheduel.id_scheduel')
                ->select('content_group_scheduel.require', 'content_group_scheduel.time_deadline', 'content_group_scheduel.penalty', 'content_group_scheduel.require')
                ->where('group.id_group', '=', 5)
                ->get();
            }
        else {
            $scheduel_contents = DB::table('subject')->join('subject_scheduel', 'subject.id_subject', '=', 'subject_scheduel.id_subject')
                ->join('content_sub_scheduel', 'subject_scheduel.id_subject_scheduel', '=', 'content_sub_scheduel.id_subject_scheduel')
                ->select('content_sub_scheduel.require', 'content_sub_scheduel.time_deadline', 'content_sub_scheduel.penalty', 'content_sub_scheduel.require')
                ->where('subject_scheduel.semester', '=', '20181')
                ->where('subject.id_subject', '=', 4)
                ->get();
        }
		$total_require = $scheduel_contents->count();
        $studentDocuments = DB::table('group')
                        ->join('document', 'group.id_group', '=', 'document.id_group')
                        ->join('user','document.user_upload','=','user.username')
                        ->select('document.*')
                        ->where('group.id_group', '=', 5)
                        ->where('user.position','=',1)
                        ->get();
		$total_document = $studentDocuments->count();
        $bonus = DB::table('group')->join('evalution_criteria', 'group.id_group', '=', 'evalution_criteria.id_group')->get();
        $point = 0;
        $bonus_point = 0;
        foreach ($studentDocuments as $value) {
            foreach ($scheduel_contents as $value1) {
                $match_require = DB::table('group')
                        ->join('document', 'group.id_group', '=', 'document.id_group')
                        ->join('user','document.user_upload','=','user.username')
                        ->select('document.*')
                        ->where('group.id_group', '=', 5)
                        ->where('user.position','=',1)
                        ->where('document.type','=',$value1->require)
						->get();
						
				// foreach ($match_require as $value3) {
				// 	echo($value3->type);
				// }

                // echo($value1->time_deadline);
				$total_require_match = $match_require->count();
				echo($total_require_match);
                if($value->type == $value1->require) {
                    $date_up = new DateTime($value->created_at);
                    $date_deadline = new DateTime($value1->time_deadline);
                    if($date_up > $date_deadline) {
                        $value->evaluate = ($value->evaluate - $value1->penalty) / $total_require_match;
                    }
                }
            }
            $point += $value->evaluate;
        }

        foreach ($bonus as  $value) {
            $bonus_point += $value->bonus;
        }

        if($total_require != 0) {
            $point_avg = $point / $total_require;
            $point_avg += $bonus_point;
            return $point_avg;
        } else {
            return $point / $total_document;
        }
});

Route::get('/', function () {
	return view('welcome');
})->name('/');

Route::group(['prefix' => 'admin'], function() {
  
	Route::get('password/{username}','ProfilesController@showpassword');
	Route::post('password/{username}/edit','ProfilesController@updateUserPassword');
	Route::get('/', function() {
		return view('admin.home');
	});
});

// Route for teacher
Route::group(['prefix' => 'teacher'], function() {

	Route::get('/', function() {
		return view('teacher.listProject');
	});
	
	Route::get('profile/{username}','ProfilesController@showProfile');
    Route::post('profile/{username}/edit','ProfilesController@updateUserAccount');
	Route::get('password/{username}','ProfilesController@showpassword');
	Route::post('password/{username}/edit','ProfilesController@updateUserPassword');
	
	// Route::get('/search', 'ProjectController@getListProject');
	Route::group(['prefix' => 'project'], function() {
		Route::get('/', 'ProjectController@getListProject');
		Route::get('createGroup', 'AdGroupController@getCreateGroup');
		Route::post('createGroup', 'AdGroupController@createGroup');
		
		Route::get('/{id_group}', 'ProjectController@getProjectDetail');

		// Route for scheduel
		Route::get('/{id_group}/scheduel', 'ScheduelController@getScheduel');
		Route::post('/{id_group}/scheduel', 'ScheduelController@addScheduelContent');
		Route::post('/{id_group}/scheduel/delete', 'ScheduelController@delScheduelContent');
		Route::get('/{id_group}/scheduel/update/{id_content}', 'ScheduelController@getUpdateScheduelContent');
		Route::post('/{id_group}/scheduel/update/{id_content}', 'ScheduelController@postUpdateScheduelContent');
	
		// Route for evaluation
		Route::get('/{id_group}/evaluation', 'EvaluationController@getEvaluation');
		Route::post('/{id_group}/evaluation', 'EvaluationController@addEvaluation');
		Route::post('/{id_group}/evaluation/delete', 'EvaluationController@delEvaluation');
		Route::get('/{id_group}/evaluation/update/{id}', 'EvaluationController@getUpdateEvaluation');
		Route::post('/{id_group}/evaluation/update/{id}', 'EvaluationController@postUpdateEvaluation');

		// Route for listStudent
		Route::get('/{id_group}/listStudent', 'StudentOfGroupController@getListStudent');
		Route::post('/{id_group}/listStudent', 'StudentOfGroupController@addStudentOfGroup');
		Route::post('/{id_group}/listStudent/delete', 'StudentOfGroupController@delStudentOfGroup');
        
        // Router for file
         Route::get('/{id_group}/document', 'DocumentController@getDocument');
        Route::post( '/{id_group}/document','DocumentController@uploadFile');
        Route::get( '/{id_group}/document/{id_document}/download/','DocumentController@downloadFile');
        Route::get( '/{id_group}/document/{id_document}/delete/','DocumentController@deleteFile');
		Route::get('/{id_group}/document/{id_document}/evaluate/{point}', 'DocumentController@evaluateFile');
	});
});

// /Route for student
Route::group(['prefix' => 'student'], function() {

	Route::get('/', function() {
		return view('student.listProject');
	});

    Route::get('profile/{username}','ProfilesController@showProfile');
    Route::post('profile/{username}/edit','ProfilesController@updateUserAccount');
	Route::get('password/{username}','ProfilesController@showpassword');
	Route::post('password/{username}/edit','ProfilesController@updateUserPassword');

	
	// Route::get('/search', 'ProjectController@getListProject');
	Route::group(['prefix' => 'project'], function() {
		Route::get('/', 'ProjectController@getListProject');
		Route::get('/{id_group}', 'ProjectController@getProjectDetail');

		// Route for scheduel
		Route::get('/{id_group}/scheduel', 'ScheduelController@getScheduel');
	
		// Route for evaluation
		Route::get('/{id_group}/evaluation', 'EvaluationController@getEvaluation');

		// Route for listStudent
		Route::get('/{id_group}/listStudent', 'StudentOfGroupController@getListStudent');
		Route::post('/{id_group}/listStudent', 'StudentOfGroupController@addStudentOfGroup');
       
        Route::get('/{id_group}/document', 'DocumentController@getDocument');
        Route::post( '/{id_group}/document','DocumentController@uploadFile');
        Route::get( '/{id_group}/document/{id_document}/download/','DocumentController@downloadFile');
        Route::get( '/{id_group}/document/{id_document}/delete/','DocumentController@deleteFile');



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
		Route::get('listAdmin/search', 'AdUserController@postSearch');
		Route::get('listAdmin/searchPagination', 'AdUserController@getSearchPagination');
		Route::get('listTeacher', 'AdTeacherController@getListTeacher');
		Route::get('listTeacher/search', 'AdTeacherController@postSearch');
		Route::get('listTeacher/searchPagination', 'AdTeacherController@getSearchPagination');
		Route::get('listStudent', 'AdStudentController@getListStudent');
		Route::get('listStudent/search', 'AdStudentController@postSearch');
		Route::get('listStudent/searchPagination', 'AdStudentController@getSearchPagination');

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
