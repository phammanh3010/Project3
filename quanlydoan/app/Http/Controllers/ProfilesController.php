<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Theme;
use App\User;
use App\Notifications\SendGoodbyeEmail;
use App\Traits\CaptureIpTrait;
use File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Image;
use jeremykenedy\Uuid\Uuid;
use Validator;
use View;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function getUserByUsername($username)
    
    {   $user =User::find($username);
        if($user->position==1)
            return User::with('student')->whereusername($username)->firstOrFail();
        if($user->position==2)
            return User::with('teacher')->whereusername($username)->firstOrFail();
        if($user->position==3)
            return User::whereusername($username)->firstOrFail();    
    }

    /**
     * Display the specified resource.
     *
     * @param string $username
     *
     * @return Response
     */
    public function showProfile($username)
    {
        try {
            $user = $this->getUserByUsername($username);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

       # print($user);
/*
        $group = Group::find($user->student->id);

        $data = [
            'user'         => $user,
            'currentTheme' => $currentTheme,
        ];

  
        return view('profiles.show')->with($data);
        */
        if($user->position==1)
          return view('student.profile.profileStudent',['user' => $user]);
        if($user->position==2)
          return view('teacher.profile.profileTeacher',['user' => $user]);
    }

    public function showPassword($username)
    {
        try {
            $user = $this->getUserByUsername($username);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

/*
        $group = Group::find($user->student->id);

        $data = [
            'user'         => $user,
            'currentTheme' => $currentTheme,
        ];

  
        return view('profiles.show')->with($data);
        */
    
        if($user->position==1)
         return view('student.profile.updatePassword',['user' => $user]);
         elseif($user->position==2)
         return view('teacher.profile.updatePassword',['user' => $user]);
         else{

            return view('admin.profile.updatePassword',['user' => $user]);
         }
    }



   

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserAccount(Request $request,$username)
    {   try {
        $user = $this->getUserByUsername($username);

       } catch (ModelNotFoundException $exception) {
        abort(404);
       }
       if($user->position ==1)
        {$this->validate($request, 
            [
                'full_name' => 'required|min:3|max:45',
                'class' => 'nullable|min:3|max:45',
                'email' => 'required|email',
                'phone' => 'nullable|regex:/(0)[0-9]/|min:10|max:11'
            ], 
            [   
                'full_name.required' => 'Bạn chưa nhập Họ Tên',
                'full_name.min' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',
                'full_name.max' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',

              
                'class.min' => 'Lớp cần có độ dài từ 3 đến 45 kí tự',
                'class.max' => 'Lớp cần có độ dài từ 3 đến 45 kí tự',

                'email.email' => 'Bạn cần nhập đúng địa chỉ email',

                'phone.regex' => 'SĐT chỉ nên chứa chữ số và bắt đầu bằng 0',
                'phone.min' => 'SĐT cần có độ dài 10 hoặc 11 số',
                'phone.max' => 'SĐT cần có độ dài 10 hoặc 11 số'
            ]);
        
        
            $user->full_name = $request->input('full_name');
            $user->student->class = $request->input('class');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->save();
            $user->student->save();
            Session::flash('thongbao','Cập nhập thành công ');
       
        return redirect('student/profile/'.$user->username.'/');
            
        }elseif($user->position ==2){
            $this->validate($request, 
                [
                    'full_name' => 'required|min:3|max:45',
                    'workplace' => 'nullable|min:3|max:45',
                    'email' => 'required|email',
                    'phone' => 'nullable|regex:/(0)[0-9]/|min:10|max:11'
                ], 
                [   
                    'full_name.required' => 'Bạn chưa nhập Họ Tên',
                    'full_name.min' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',
                    'full_name.max' => 'Họ Tên cần có độ dài từ 3 đến 45 kí tự',
    
                   
                    'workplace.min' => 'Nơi làm việc cần có độ dài từ 3 đến 45 kí tự',
                    'workplace.max' => 'Nơi làm việc cần có độ dài từ 3 đến 45 kí tự',
    
                    'email.email' => 'Bạn cần nhập đúng địa chỉ email',
                    'email.required' => 'Bạn chưa nhập địa chỉ email',
                    'phone.regex' => 'SĐT chỉ nên chứa chữ số và bắt đầu bằng 0',
                    'phone.min' => 'SĐT cần có độ dài 10 hoặc 11 số',
                    'phone.max' => 'SĐT cần có độ dài 10 hoặc 11 số'
                ]);
            
            
                $user->full_name = $request->input('full_name');
                $user->teacher->workplace =$request->input('workplace');
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');
                $user->save();
                $user->teacher->save();
                Session::flash('thongbao','Cập nhập thành công ');
           
            return redirect('teacher/profile/'.$user->username.'/');
                
            }



        }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserPassword(Request $request,$username)
    {
        try {
            $user = $this->getUserByUsername($username);
    
           } catch (ModelNotFoundException $exception) {
            abort(404);
           }
        if(Hash::check($request->input('old_password'), $user->password))
               
        {    $validator = Validator::make($request->all(),
                [
                    'password'              => 'required|min:6|max:20|confirmed',
                    'password_confirmation' => 'required|same:password',
                ],
                [   'password_confirmation.same'=> 'Mật khẩu xác nhận cần giống với mật khẩu mới',
                    'password.required' => 'Password là trường bắt buộc cần nhập',
                    'password.min'      => 'Password cần có độ dài từ 6 đến 20 kí tự',
                    'password.max'      =>'Password cần có độ dài từ 6 đến 20 kí tự',
                ]
            );
            if($request->input('old_password') == $request->input('password')){
                Session::flash('thongbao','Password mới trùng với Password cũ ');
                if($user->position==1)
                  return redirect('student/password/'.$user->username.'/');
                if($user->position==2)
                  return redirect('teacher/password/'.$user->username.'/');
                if($user->position==3)
                  return redirect('admin/password/'.$user->username.'/');


            }
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }


            if ($request->input('password') != null) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();
            Session::flash('thongbao','Thay đổi password thành công');
            if($user->position==1)
                return redirect('student/profile/'.$user->username.'/');
            if($user->position==2)
                return redirect('teacher/profile/'.$user->username.'/');
            if($user->position==3)
                return redirect('admin/');
        }else{
            Session::flash('thongbao','Password nhập vào sai ');
            if($user->position==1)
                return redirect('student/password/'.$user->username.'/');
            if($user->position==2)
                return redirect('teacher/password/'.$user->username.'/');
            if($user->position==3)
                return redirect('admin/password/'.$user->username.'/');
        }

    }

    
}
