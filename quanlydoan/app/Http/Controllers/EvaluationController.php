<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
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


        return view('teacher.evaluate', ['evaluations' => $evaluations]);
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
            echo json_encode($data);
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
            echo json_encode($data);
        }
    }       

    // public function delEvaluation($id_group, $id_evalution_criteria) {
    //     $content = EvalutionCriteria::find($id_evalution_criteria);
    //     $content->delete();    
    //     return redirect('teacher/project/'.$id_group.'/evaluation')->with('thongbao','Bạn đã xóa thành công!');

    // }

    public function delEvaluation(Request $request, $id_group) {
        $content = EvalutionCriteria::find($request->id);
        $content->delete(); 
        $id = $request->id;   
        $message = "<div class='alert alert-success'>Bạn đã xoá thành công!</div>";
        $data = array(
            "message" => $message,
            "id"    => $id
        );
        echo json_encode($data);

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