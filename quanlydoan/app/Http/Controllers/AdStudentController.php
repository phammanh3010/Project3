<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdStudentController extends Controller
{
    //
	public function getListStudent(){
		$student = DB::table('user')->join('student', 'student.username', '=', 'user.username')->get();
		return view('admin.user.listStudent',['student'=>$student]);
	}
}
