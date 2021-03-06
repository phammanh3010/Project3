<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\GroupStudent;
use App\Group;
use App\Student;

class StudentOfGroupController extends Controller
{   

    public function getListStudent($id_group) {
        $listStudents = DB::table('student')->join('group_student', 'student.id_student', '=', 'group_student.id_student')
                            ->join('group', 'group.id_group', '=', 'group_student.id_group')
                            ->join('user', 'user.username', '=', 'student.username')
                            ->select('student.class', 'user.*', 'group_student.id_group_student')
                            ->where('group.id_group', '=', $id_group)->get();

        $project = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')
            ->join('user', 'user.username', '=', 'teacher.username')
            ->select('group.*', 'user.full_name')
            ->where('group.id_group', '=', $id_group)->get(); 
            
        if(Auth::user()->position == 2) {
            return view('teacher.listStudentOfGroup', ['listStudents' => $listStudents, 'projects' => $project]);
        }
        if(Auth::user()->position == 1) {
            return view('student.listStudentOfGroup', ['listStudents' => $listStudents, 'projects' => $project]);
        }
    }

    public function addStudentOfGroup(Request $request, $id_group) {
        $student_group = new GroupStudent();
        $student_infor = DB::table('student')->join('user', 'user.username', '=', 'student.username')
                            ->select('student.*', 'user.*')
                            ->where('student.username', '=', $request->username)
                            ->get();
        $total_row = $student_infor->count();

        // Check student is exist
        if($total_row > 0){
            // check student in group
            $listStudents = DB::table('student')->join('group_student', 'student.id_student', '=', 'group_student.id_student')
                            ->join('group', 'group.id_group', '=', 'group_student.id_group')
                            ->select('group_student.id_group_student')
                            ->where('group.id_group', '=', $id_group)
                            ->where('student.username', '=', $request->username)->get();
            if($listStudents->count() > 0) {
                $error = "error";
                $data = array(
                    "error_student_in_group" => $error
                );
                return response($data);
            }
            else {
                //đọc dữ liệu từ $student_infor
                foreach ($student_infor as $value) {
                    $id_student = $value->id_student;
                    $username = $value->username;
                    $full_name = $value->full_name;
                    $class = $value->class;
                    $email = $value->email;
                    $phone = $value->phone;
                }

                $student_group->id_group = $id_group;
                $student_group->id_student = $id_student;
                $student_group->save();

                $data = array(
                    "username"  => $username,
                    "full_name" => $full_name,
                    "class"     => $class,
                    "email"     => $email,
                    "phone"     => $phone,
                    //đọc id của bản ghi mới được thêm vào bảng grop_student
                    "id_group_student"  => $student_group->id_group_student
                );
                return response($data);
            }
        }
        else {
            $error = "error";
            $data = array(
                "error_student_not_exist" => $error
            );
            return response($data);
        }
    }       

    public function delStudentOfGroup(Request $request, $id_group) {
        $content = GroupStudent::find($request->id);
        $content->delete();    
        $id = $request->id;
        return response($id);
    }

}