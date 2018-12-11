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
}
