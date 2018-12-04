<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\GroupScheduel;
use App\ContentGroupScheduel;
use App\Group;

class ScheduelController extends Controller
{   

    public function getScheduel( $id_group) {
        $scheduel_contents = DB::table('group')->join('group_scheduel', 'group.id_group', '=', 'group_scheduel.id_group')
                ->join('content_group_scheduel', 'group_scheduel.id_scheduel', '=', 'content_group_scheduel.id_scheduel')
                ->select('content_group_scheduel.*')
                ->where('group.id_group', '=', $id_group)
                ->get();

        $scheduel_subject_contents = DB::table('group')->join('subject_scheduel', 'group.id_subject', '=', 'subject_scheduel.id_subject')
                ->join('content_sub_scheduel', 'subject_scheduel.id_subject_scheduel', '=', 'content_sub_scheduel.id_subject_scheduel')
                ->select('content_sub_scheduel.*')
                ->where('subject_scheduel.semester', '=', 20181)
                ->get();

        return view('teacher.scheduel', ['scheduel_contents' => $scheduel_contents, 'scheduel_subject_contents' => $scheduel_subject_contents]);
    }

    public function addScheduelContent(Request $request, $id_group) {
        $validator = \Validator::make($request->all(), 
            [
            'content' => 'required|min:3|max:2000',
            'bonus' => 'required|min:0|max:10'
            ], 
            [
            'content.required' => 'Bạn chưa nhập Nội dung tiêu chí',
            'content.min' => 'Nội dung tiêu chí cần có độ dài từ 3 đến 2000 kí tự',
            'content.max' => 'Nội dung tiêu chí cần có độ dài từ 3 đến 2000 kí tự',

            'bonus.required' => 'Bạn chưa nhập điểm ']
        );

        if ($validator->fails())
        {
            $data = array(
                "error" => $validator->errors()->all()
            );
            echo json_encode($data);
        }
            $id_scheduel = DB::table('group_scheduel')->select('id_scheduel')->where('id_group', '=', $id_group)
                            ->get();
            $total = $id_scheduel->count();
            foreach ($id_scheduel as $value) {
                $id = $value->id_scheduel;
            }
            if($total > 0) {
                $scheduelContent = new ContentGroupScheduel();
                $scheduelContent->id_scheduel = $id;
                $scheduelContent->time_deadline = $request->deadline;
                $scheduelContent->require = $request->require.$request->descript;
                $scheduelContent->penalty = $request->penalty;
                $scheduelContent->save();
                
                $data = array(
                    "output" => $scheduelContent->id_content
                );
                echo json_encode($data);
                
            }
            else {

                $scheduel = new GroupScheduel();
                $scheduel->id_group = $id_group;
                $scheduel->save();
                $id_scheduel = DB::table('group_scheduel')->select('id_scheduel')->where('id_group', '=', $id_group)->get();

                foreach ($id_scheduel as $value) {
                    $id = $value->id_scheduel;
                }

                $scheduelContent = new ContentGroupScheduel();
                $scheduelContent->id_scheduel = $id;
                $scheduelContent->time_deadline = $request->deadline;
                $scheduelContent->require = $request->require."/".$request->descript;
                $scheduelContent->penalty = $request->penalty;
                $scheduelContent->save();
                
                $data = array(
                    "output" => $scheduelContent->id_content
                );
                echo json_encode($data);
            }
    }

    // public function delScheduelContent($id_group, $id_content) {
    //     $content = ContentGroupScheduel::find($id_content);
    //     $content->delete();    
    //     return redirect('teacher/project/'.$id_group.'/scheduel')->with('thongbao','Bạn đã xóa thành công');

    // }

    public function delScheduelContent(Request $request, $id_group) {
        $content = ContentGroupScheduel::find($request->id);
        $content->delete();   
        $id = $request->id;   
        $message = "<div class='alert alert-success'>Bạn đã xoá thành công!</div>";
        $data = array(
            "message" => $message,
            "id"    => $id
        );
        echo json_encode($data); 

    }

    public function getUpdateScheduelContent($id_group, $id_content) {
        $content = ContentGroupScheduel::find($id_content); 
        return view('teacher/updateScheduel', ['content' => $content]);
    }

    public function postUpdateScheduelContent(Request $request, $id_group, $id_content) {
        $content = $content = ContentGroupScheduel::find($id_content); 
        $content->time_deadline = $request->time_deadline;
        $content->require = $request->require;
        $content->descript = $request->descript;
        $content->time_deadline = $request->time_deadline;
        $content->save();

        return redirect('teacher/project/'.$id_group.'/scheduel')->with('thongbao','Bạn đã sửa thành công');
    }
}