<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\DashIcon;
use App\Models\Notice;
use App\Models\Page;
use App\Models\RoadSign;
use App\Models\Setting;
use App\Models\Youtube;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function roadSign(){
        $icons = RoadSign::all();
        return view('road-sign', ['icons' => $icons]);
    }

    public function dashIcon(){
        $icons = DashIcon::all();
        return view('dash-icon', ['icons' => $icons]);
    }

    public function examPrep($id){
        $eps = Content::where('course_id', 999)->get();
        $content = Content::find($id);

        if($content == null){
            $content1 = Content::where('course_id', 999)->first();

            return view('exam-prep', ['eps' => $eps, 'content' => $content1]);
        }else{
            return view('exam-prep', ['eps' => $eps, 'content' => $content]);
        }
    }

    public function notice(){
        $notices = Notice::all();
        return view('notice', ['notices' => $notices]);
    }

    public function youtube(){
        $videos = Youtube::all();
        return view('youtube', ['videos' => $videos]);
    }

    public function course(){
        $courses = Course::all();
        return view('course', ['courses' => $courses]);
    }

    public function viewCourse($slug){
        $course = Course::where('slug', $slug)->first();
        return view('course-view', ['course' => $course]);
    }

    public function content($slug, $id){
        $course = Course::where('slug', $slug)->first();
        $content = Content::findOrFail($id);
        return view('content', ['course' => $course, 'content' => $content]);
    }

    public function contact(){
        $page = Page::find(1);
        return view('page', ['page' => $page->contact, 'title' => 'যোগাযোগ']);
    }

    public function privacy(){
        $page = Page::find(1);
        return view('page', ['page' => $page->privacy, 'title' => 'গোপনীয়তা নীতি']);
    }

    public function terms(){
        $page = Page::find(1);
        return view('page', ['page' => $page->terms, 'title' => 'শর্তাবলী']);
    }

    public function return(){
        $page = Page::find(1);
        return view('page', ['page' => $page->return, 'title' => 'রিটার্ন পলিসি']);
    }


}
