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

    public function getDocument() {
        $id_group = $request->get('id_group');

        $document = DB::table('group')->join('document', 'group.id', '=', 'document.id_group')
                        ->select("document.path, document.evaluate, document.user_upload, document.created_at")
                        ->where('group.id', '=', $group_id)->get();
        return view('student.document', ['ducuments'=> $document]);
    } 

}