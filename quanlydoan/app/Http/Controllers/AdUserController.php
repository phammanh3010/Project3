<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Teacher;
use App\Student;

class AdUserController extends Controller
{
    //
    public function getListAdmin(){
    	$admin = User::where('position', '=', '3')->get();
    	return view('admin.user.listAdmin',['admin'=>$admin]);
    }

    public function getListTeacher(){
    	$teacher = DB::table('user')->join('teacher', 'teacher.username', '=', 'user.username')->get();
    	return view('admin.user.listTeacher',['teacher'=>$teacher]);
    }

    public function getListStudent(){
    	$student = DB::table('user')->join('student', 'student.username', '=', 'user.username')->get();
    	return view('admin.user.listStudent',['student'=>$student]);
    }

    public function getUpdateAdmin($username){
    	$admin = User::find($username);
    	return view('admin.user.updateAdmin', ['admin'=>$admin]);
    }

    public function postUpdateAdmin(Request $request, $username){
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

    	$admin = User::find($username);
    	$admin->username = $request->username;
    	$admin->password = $request->password;
    	$admin->position = 3;
    	$admin->full_name = $request->full_name;
    	$admin->email = $request->email;
    	$admin->phone = $request->phone;
    	$admin->save();

    	return redirect('admin/user/listAdmin')->with('thongbao','Bạn đã sửa thành công');
    }

    public function getDeleteAdmin($username){
    	$admin = User::find($username);
    	$admin->delete();

    	return redirect('admin/user/listAdmin')->with('thongbao','Bạn đã xóa thành công');
    }

    public function postAddOrSearch(Request $request){
    	
    	if (Input::get('action') == 'add') {
            return $this->postAddAdmin($request);
        } elseif (Input::get('action') == 'search') {
            return $this->postSearchAdmin($request);
        }

    }

    public function postAddAdmin(Request $request){
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

    	$admin = new User;
    	$admin->username = $request->username;
    	$admin->password = $request->password;
    	$admin->position = 3;
    	$admin->full_name = $request->full_name;
    	$admin->email = $request->email;
    	$admin->phone = $request->phone;
    	$admin->save();

    	return redirect(url('admin/user/listAdmin'))->with('thongbao','Bạn đã thêm thành công');

    }

    public function postSearchAdmin(Request $request){
    	//
    	$admin = new User;

    	return redirect(url('admin/user/listAdmin'))->with('thongbao','Bạn đã thêm thành công');
    }



}
