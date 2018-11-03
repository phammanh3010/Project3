<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/listTeacher', function () {
    return view('pages.listTeacher');
});

Route::get('/listProject', function () {
    return view('pages.listProject');
});

Route::get('/createProject', function () {
    return view('pages.createProject');
});

Route::get('/projectDetail', function () {
    return view('pages.projectDetail');
});

Route::get('/profileStudent', function () {
    return view('pages.profileStudent');
});

Route::get('/profileTeacher', function () {
    return view('pages.profileTeacher');
});

Route::get('/teacherDetail', function () {
    return view('pages.teacherDetail');
});