<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\User;
use App\EvalutionCriteria;
use App\Group;

class EvaluationController extends Controller
{   

    public function getEvaluation($id_group) {
        $evaluations = DB::table('group')->join('evalution_criteria', 'group.id_group', '=', 'evalution_criteria.id_group')
                ->select('evalution_criteria.*')
                ->where('group.id_group', '=', $id_group)
                ->get();
        $project = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')
                ->join('user', 'user.username', '=', 'teacher.username')
                ->select('group.*', 'user.full_name')
                ->where('group.id_group', '=', $id_group)->get(); 
                
        if(Auth::user()->position == 2) {
            return view('teacher.evaluate', ['evaluations' => $evaluations, 'projects' => $project]);
        }
        if(Auth::user()->position == 1) {
            return view('student.evaluate', ['evaluations' => $evaluations, 'projects' => $project]);
        }
    }

    public function addEvaluation(Request $request, $id_group) {

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
            return response($data);
        }
        else {
            $evaluations = new EvalutionCriteria();
            $evaluations->id_group = $id_group;
            $evaluations->content = $request->content;
            $evaluations->bonus = $request->bonus;
            $evaluations->save();
            
            $data = array(
                "output" => $evaluations->id_evalution_criteria
            );
            return response($data);
        }
    }       

    public function delEvaluation(Request $request, $id_group) {
        $content = EvalutionCriteria::find($request->id);
        $content->delete(); 
        $id = $request->id;  
        return response($id); 
    }

    public function getUpdateEvaluation($id_group, $id_evalution_criteria) {
        $content = EvalutionCriteria::find($id_evalution_criteria); 
        return view('teacher/updateEvaluate', ['content' => $content]);
    }

    public function postUpdateEvaluation(Request $request, $id_group, $id_evalution_criteria) {
        $content = EvalutionCriteria::find($id_evalution_criteria); 
        $content->content = $request->content;
        $content->bonus = $request->bonus;
        $content->save();
        return redirect('teacher/project/'.$id_group.'/evaluation')->with('thongbao','Bạn đã sửa thành công!');
    }

    
}