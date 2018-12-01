<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdScheduelController extends Controller
{
    //
    public function getScheduel(){
    	return view('admin.scheduel.scheduel');
    }
}
