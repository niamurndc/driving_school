<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $courses = Course::all();
        return view('admin.course.index', ['courses' => $courses]);
    }

    public function create(){
        return view('admin.course.add');
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required|string|unique:courses',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'cprice' => 'nullable|numeric',
            'desc' => 'required|string',
            'material' => 'required',
            'feature' => 'required'
        ]);


        $course = new Course();

        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->price = $request->price;
        $course->cprice = $request->cprice;
        $course->desc = $request->desc;
        $course->material = json_encode($request->material);
        $course->feature = json_encode($request->feature);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'course-'.time().'.'.$ext;
        $course->image = $cover;
        $path = 'uploads/course';
        $image->move($path, $cover);

        $course->save();
        return redirect('/admin/courses')->with('message', 'Added Successful');
    }

    public function edit($id){
        $course = Course::find($id);
        return view('admin.course.edit', ['course' => $course]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'nullable|image',
            'price' => 'required|numeric',
            'cprice' => 'nullable|numeric',
            'desc' => 'required|string',
            'material' => 'required',
            'feature' => 'required'
        ]);

        $course = Course::find($id);

        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->price = $request->price;
        $course->cprice = $request->cprice;
        $course->desc = $request->desc;
        $course->material = json_encode($request->material);
        $course->feature = json_encode($request->feature);

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'course-'.time().'.'.$ext;
            $course->image = $cover;
            $path = 'uploads/course';
            $image->move($path, $cover);
        }
        

        $course->update();
        return redirect('/admin/courses')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $course = Course::find($id);
        $course->delete();
        return redirect('/admin/courses')->with('message', 'Deleted Successful');
    }
}
