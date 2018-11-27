<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListProjectController extends Controller
{
    //hien thi len danh sach cac mon do an
    public function getListProject(){
    	return view('admin.project.listProject');
    }

    //tim kiem theo ten giang vien

    
}
