<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Student;
use App\GroupStudent;
use App\Group;
use App\Document;
class StudentController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:STUDENT');
    }
}
