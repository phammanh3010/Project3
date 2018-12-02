<?php

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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:STUDENT');
    // }
    //
    public function getListProject()
    {   
        $user_id = Auth::id();
        $listProject  = DB::table('student')->join('group_student', 'student.id_student', '=', 'group_student.id_student')
        ->join('group', 'group.id_group', '=', 'group_student.id_group')
        ->join('teacher', 'group.id_teacher', '=', 'teacher.id')
        ->join('user', 'user.username', '=', 'teacher.username')
        ->select('user.full_name', 'group.group_name', 'group.project_name', 'group.finish_project')
        ->where('student.id', '=',  $user_id)->get();
 
        return view('pages.listProject');
    }

    public function projectDetail($group_id) {

    }

    public function getDocument($group_id) {
        $document = DB::table('group')->join('document', 'group.id', '=', 'document.id_group')
                        ->select("document.path, document.evaluate, document.user_upload, document.created_at")
                        ->where('group.id', '=', $group_id)->get();
        return response()->json(array('document'=> $document), 200);
    } 
}
