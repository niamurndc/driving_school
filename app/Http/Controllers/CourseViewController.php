<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index($id){
        $course = Course::find($id);
        return view('admin.course.view', ['course' => $course]);
    }

    public function student($id){
        $course = Course::find($id);
        return view('admin.course.student', ['course' => $course]);
    }
}
