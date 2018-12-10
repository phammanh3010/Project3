<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Student;
use App\GroupStudent;
use App\Group;
use App\Document;

class ProjectController extends Controller
{   

    public function getListProject(Request $request)
    {   
        if($request->ajax()){
            $output = '';
            $semester = $request['search'];
            $user = Auth::user();
            if(Auth::user()->position == 2) {
                $listProject  = DB::table('teacher')
                ->join('group', 'group.id_teacher', '=', 'teacher.id_teacher')
                ->join('user', 'user.username', '=', 'teacher.username')
                ->select('user.full_name', 'group.*')
                ->where('teacher.username', '=',  $user->username)
                ->where('group.semester', '=', $semester)->get();
            }
            if(Auth::user()->position == 1) {
                $listProject  = DB::table('student')->join('group_student', 'student.id_student', '=', 'group_student.id_student')
                ->join('group', 'group.id_group', '=', 'group_student.id_group')
                ->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')
                ->join('user', 'user.username', '=', 'teacher.username')
                ->select('user.full_name', 'group.*')
                ->where('student.username', '=',  $user->username)
                ->where('group.semester', '=', $semester)->get();
            }

            $total_row = $listProject->count();
            if($total_row > 0){
                $view = view('pages.getListProject', compact('listProject'));
                return response($view);
            }
            else{
                $output = 'output';
                $data = array(
                    'table_data'  => $output
                );
                return response($data);
            }
        }
    }

    public function getProjectDetail($id_group) {

        $project = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')
        ->join('user', 'user.username', '=', 'teacher.username')
        ->select('group.*', 'user.full_name')
        ->where('group.id_group', '=', $id_group)->get();
        if(Auth::user()->position == 2) {
            return view('teacher.projectDetail', ['projects'=> $project]);
        }
        if(Auth::user()->position == 1) {
            return view('student.projectDetail', ['projects'=> $project]);
        }

    }

    public function notification() {
        $user = Auth::user();
        // f(Auth::user()->position == 2) {

        // }
        if(Auth::user()->position == 1) {
            $noticfication = DB::table('student')
            ->join('group_student', 'student.id_student', '=', 'group_student.id_student')
            ->join('group', 'group.id_group', '=', 'group_student.id_group')
            ->join('group_scheduel', 'group.id_group', '=', 'group_scheduel.id_group')
            ->join('content_group_scheduel', 'group_scheduel.id_scheduel', '=', 'content_group_scheduel.id_scheduel')
            ->select('group.*')
            ->where('student.username', '=', '20152128')->get();
        }
    }

    public function getAdListProject($id_subject){
        
        return view('admin.project.listProject');
    }


    public function getAdSearchListProject(Request $request, $id_subject){
        if($request->ajax()){
            $semester = $request['semester'];
            $query = $request['search'];
            $user = Auth::user();
            if(Auth::user()->position == 3) {
                $teacher  = $this->searchTeacher($query, $id_subject, $semester);
                $student  = $this->searchStudent($query, $id_subject, $semester);
                $doc  = $this->searchDocument($query, $id_subject, $semester);
            }
            
            $view = view('admin.project.getListProject', compact('teacher','student', 'doc'));
            return response($view);
            
        }
    }


    public function searchTeacher($query, $id_subject, $semester){
        if($query != ''){
            return $teacher = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')->join('user', 'teacher.username', '=', 'user.username')->select(DB::raw('user.full_name AS teacher_full_name'), 'group.*')->where('user.full_name', 'like', '%'.$query.'%')->where('semester', 'like', $semester)->where('id_subject', '=', $id_subject)->get();

        }
        else{
            return $teacher = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')->join('user', 'teacher.username', '=', 'user.username')->select(DB::raw('user.full_name AS teacher_full_name'), 'group.*')->where('semester', 'like', $semester)->where('id_subject', '=', $id_subject)->get();
        }
    }

    public function searchStudent($query, $id_subject, $semester){
        if($query != ''){
            return $student = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')->join('user', 'teacher.username', '=', 'user.username')->join('group_student', 'group.id_group', '=', 'group_student.id_group')->join('student', 'group_student.id_student', '=', 'student.id_student')->join('user as user2', 'student.username', '=', 'user2.username')->select(DB::raw('user.full_name AS teacher_full_name'), DB::raw('user2.full_name AS student_full_name'), 'group.*')->where('user.full_name', 'like', '%'.$query.'%')->where('semester', 'like', $semester)->where('id_subject', '=', $id_subject)->get();

        }
        else{
            return $student = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')->join('user', 'teacher.username', '=', 'user.username')->join('group_student', 'group.id_group', '=', 'group_student.id_group')->join('student', 'group_student.id_student', '=', 'student.id_student')->join('user as user2', 'student.username', '=', 'user2.username')->select(DB::raw('user.full_name AS teacher_full_name'), DB::raw('user2.full_name AS student_full_name'), 'group.*')->where('semester', 'like', $semester)->where('id_subject', '=', $id_subject)->get();
        }
    }

    public function searchDocument($query, $id_subject, $semester){
        if($query != ''){
            return $doc = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')->join('user', 'teacher.username', '=', 'user.username')->join('document', 'group.id_group', '=', 'document.id_group')->select(DB::raw('user.full_name AS teacher_full_name'), 'group.*', 'document.type AS type')->where('user.full_name', 'like', '%'.$query.'%')->where('semester', 'like', $semester)->where('id_subject', '=', $id_subject)->get();

        }
        else{
            return $doc = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')->join('user', 'teacher.username', '=', 'user.username')->join('document', 'group.id_group', '=', 'document.id_group')->select(DB::raw('user.full_name AS teacher_full_name'), 'group.*', 'document.type AS type')->where('semester', 'like', $semester)->where('id_subject', '=', $id_subject)->get();
        }
    }

}
