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
            $semester = $request->get('query');
            $user_id = Auth::id();
            $listProject  = DB::table('student')->join('group_student', 'student.id_student', '=', 'group_student.id_student')
                ->join('group', 'group.id_group', '=', 'group_student.id_group')
                ->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')
                ->join('user', 'user.username', '=', 'teacher.username')
                ->select('user.full_name', 'group.group_name', 'group.project_name', 'group.finish_project', 'group.id_group')
                ->where('student.id_student', '=',  $user_id)
                ->where('group.semester', '=', $semester)->get();

            $total_row = $listProject->count();
            if($total_row > 0){
              foreach($listProject as $row){
                $output .= '
                <tr>
                    <td>'.$row->full_name.'</td>
                    <td>'.$row->group_name.'</td>
                    <td>'.$row->project_name.'</td>
                    <td>'.$row->finish_project.'</td>
                    <td><a href="'.url()->current().'/project/'.$row->id_group.'"'.'class="btn btn-primary text-center">Chi tiết</a></td>
                </tr>
                ';
              }
            }
            else{
              $output = '
              <tr>
              <td align="center" colspan="5">No Data Found</td>
              </tr>
              ';
            }
            $data = array(
             'table_data'  => $output
            );
        
            echo json_encode($data);
        }
    }

    public function getProjectDetail($id_group) {
        
        $project = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')
            ->join('user', 'user.username', '=', 'teacher.username')
            ->select('group.group_name', 'group.project_name', 'user.full_name', 'group.semester')
            ->where('group.id_group', '=', $id_group)->get();
        return view('pages.projectDetail', ['projects'=> $project]);
    }
}
