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
use App\GroupScheduel;
use App\Group;
use App\Document;

class ProjectController extends Controller
{   

    public function getScheduel(Request $request) {
        $id_group = $request->get('id_group');
        $scheduel_contents = DB::table('group')->join('group_scheduel', 'group.id_group', '=', 'group_scheduel.id_scheduel')
                ->join('content_group_scheduel', 'group_scheduel.id_scheduel', '=', 'content_group_scheduel.id_content')
                ->select('content_group_scheduel.require', 'time_deadline', 'penalty')->where('id_group', '=', $id_group)
                ->get();
        return view('teacher.scheduel', ['scheduel_contents' =>$scheduel_contents]);
    }

    public function addScheduelContent(Request $request) {
        if($request->ajax()) {
            $output = " ";
            $id_group = $request->get('id_group');
            $id_scheduel = DB::table('group_scheduel')->select('id_scheduel')->where('id_group', '=', $id_group)
                            ->get();
            $total = $scheduelGroup->count();
            if($total = 1) {
                $scheduelContent = new ContentGroupScheduel();
                $scheduelContent->id_scheduel = $id_scheduel;
                $scheduelContent->time_deadline = $request->time;
                $scheduelContent->require = $request->require . $request->description;
                $scheduelContent->penalty = $request->penalty;
                $scheduelContent->save();
            }
            else {

                $scheduel = new GroupScheduel();
                $scheduel->id_group = $id_group;
                $scheduel->save();
                $id_scheduel = DB::table('group_scheduel')->select('id_scheduel')->where('id_group', '=', $id_group)->get();

                $scheduelContent->id_scheduel = $id_scheduel;
                $scheduelContent->time_deadline = $request->time;
                $scheduelContent->require = $request->require . $request->description;
                $scheduelContent->penalty = $request->penalty;
                $scheduelContent->save();
            }
            return redirect(url('teacher/group/'.$id_group))->with('thongbao','Bạn đã thêm thành công');
    }
    public function getupdateScheduelContent() {

    }

    public function postUpdateScheduelContent() {

    }
}