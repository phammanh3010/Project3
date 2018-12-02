<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated($Request, $user)
    {
    if($user->position == 1){
        return redirect('/student');
    }elseif ($user->position == 2) {
        return redirect('/teacher');
    }elseif ($user->position == 3) {
        return redirect('/admin');
    }else {
        return redirect('/');
    }
    }
    # $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    protected $redirectAfterLogout = '/';

    public function logout()
    {
        $user = Auth::user();
        Log::info('User Logged Out. ', [$user]);
        Auth::logout();
        Session::flush();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    // public function login(Request $request) {
    //     $this->validate($request,
    //         [
    //             'username' => 'required',
    //             'password' => 'required|min:6|max:32'
    //         ],
    //         [
    //             'username.required' => 'Bạn chưa nhập Username!',
    //             'password.required' => 'Bạn chưa nhập Mật khẩu!',
    //             'password.min' => 'Mật Khẩu gồm tối thiểu 6 ký tự!',
    //             'password.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
    //         ]);
    //     $username = $request->input('username');
    //     $password = $request->input('password');
    //     if(Auth::attempt(['username' => $username , 'password' => $password])) 
    //         // $user = Auth::user();
    //         // $this->authenticated($user);
    //         return redirect('/teacher');
    //     else
    //         return redirect('/')->with('message','Đăng Nhập không thành công!');
    // }
}
