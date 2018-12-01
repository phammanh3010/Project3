<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:STUDENT');
    }
    //
    public function index()
    {
        return view('student.home');
    }
}
