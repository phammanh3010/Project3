<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Teacher;

class AdTeacherController extends Controller
{
    //
	public function getListTeacher(){
		$teacher = DB::table('user')->join('teacher', 'teacher.username', '=', 'user.username')->get();
		return view('admin.user.listTeacher',['teacher'=>$teacher]);
	}

	public function getUpdateTeacher($id){
		$teacher = DB::table('user')->join('teacher', 'teacher.username', '=', 'user.username')->find($id);
		return view('admin.user.updateTeacher', ['teacher'=>$teacher]);
	}

	public function postUpdateTeacher(Request $request, $id){
		$this->validate($request, 
			[
				'username' => 'required|unique:user,username|min:3|max:45',
				'password' => 'required',
				'full_name' => 'required|min:3|max:45',
				'email' => 'email',
				'phone' => 'regex:/(0)[0-9]/|min:10|max:11'
			], 
			[
				'username.required' => 'Bạn chưa nhập Username',
				'username.unique' => 'Tài Khoản này đã tồn tại',
				'username.min' => 'Username cần có độ dài từ 3 đến 45 kí tự',
				'username.max' => 'Username cần có độ dài từ 3 đến 45 kí tự',

				'password.required' => 'Bạn chưa nhập password',

				'full_name.required' => 'Bạn chưa nhập Họ Tên',
				'full_name.min' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',
				'full_name.max' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',

				'email.email' => 'Bạn cần nhập đúng địa chỉ email',

				'phone.regex' => 'SĐT chỉ nên chứa chữ số và bắt đầu bằng 0',
				'phone.min' => 'SĐT cần có độ dài 10 hoặc 11 số',
				'phone.max' => 'SĐT cần có độ dài 10 hoặc 11 số'
			]);

		$teacher = Teacher::find($id);
		$teacher->username = $request->username;
		$teacher->password = $request->password;
		$teacher->position = 2;
		$teacher->full_name = $request->full_name;
		$teacher->email = $request->email;
		$teacher->phone = $request->phone;
		$teacher->workplace = $request->workplace;
		$teacher->save();

		return redirect('admin/user/listTeacher')->with('thongbao','Bạn đã sửa thành công');
	}

	public function getDeleteTeacher($id){
		$teacher = User::find($id);
		$teacher->delete();

		return redirect('admin/user/listTeacher')->with('thongbao','Bạn đã xóa thành công');
	}

	public function postAddTeacher(Request $request){
		$this->validate($request, 
			[
				'username' => 'required|unique:user,username|min:3|max:45',
				'password' => 'required',
				'full_name' => 'required|min:3|max:45',
				'email' => 'email',
				'phone' => 'regex:/(0)[0-9]/|min:10|max:11'
			], 
			[
				'username.required' => 'Bạn chưa nhập Username',
				'username.unique' => 'Tài Khoản này đã tồn tại',
				'username.min' => 'Username cần có độ dài từ 3 đến 45 kí tự',
				'username.max' => 'Username cần có độ dài từ 3 đến 45 kí tự',

				'password.required' => 'Bạn chưa nhập password',

				'full_name.required' => 'Bạn chưa nhập Họ Tên',
				'full_name.min' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',
				'full_name.max' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',

				'email.email' => 'Bạn cần nhập đúng địa chỉ email',

				'phone.regex' => 'SĐT chỉ nên chứa chữ số và bắt đầu bằng 0',
				'phone.min' => 'SĐT cần có độ dài 10 hoặc 11 số',
				'phone.max' => 'SĐT cần có độ dài 10 hoặc 11 số'
			]);

		
		$user = new User;
		$user->username = $request->username;
		$user->password = $request->password;
		$user->position = 2;
		$user->full_name = $request->full_name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$teacher = new Teacher;
		$teacher->username = $request->username;
		$teacher->workplace = $request->workplace;

		$user->save();
		$teacher->save();

		return redirect(url('admin/user/listTeacher'))->with('thongbao','Bạn đã thêm thành công');

	}
}
