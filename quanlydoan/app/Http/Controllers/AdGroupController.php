<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Group;
use App\Subject;

class AdGroupController extends Controller{
    public function getCreateGroup(){
        return view('teacher.createProject');
    }

    public function createGroup(Request $request){
        $username = Auth::id();
        $id_teacher = DB::table('teacher')->where('username', $username)->value('id_teacher');
        $id_subject = DB::table('subject')->where('subject_name', $request->subjectname)->value('id_subject');
        $this->validate($request,
        [
            'groupname' => 'required',
            'projectname' => 'required'
        ],
        [
            'groupname.required' => 'Bạn chưa nhập tên nhóm',
            'projectname.required' => 'Bạn chưa nhập tên đồ án'
        ]);

        $group = new Group;
        $group->id_subject = $id_subject;
        $group->id_teacher = $id_teacher;
        $group->group_name = $request->groupname;
        $group->project_name = $request->projectname;
        $group->semester = $request->semester;
        $group->finish_project = 0;

        $group->save();

        Storage::makeDirectory($request->groupname);

        return redirect(url('teacher/'))->with('thongbao','Bạn đã thêm thành công');
    }
}

?>