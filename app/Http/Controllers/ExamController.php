<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $exams = Exam::all();
        return view('admin.exam.index', ['exams' => $exams]);
    }

    public function view($id){
        $exam = Exam::find($id);
        return view('admin.exam.view', ['exam' => $exam]);
    }

    public function add(){
        return view('admin.exam.add');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'pass' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $exam = new Exam();

        $exam->title = $request->title;
        $exam->total = $request->total;
        $exam->pass = $request->pass;
        $exam->desc = $request->desc;
        $exam->time = $request->time;

        $exam->save();
        return redirect('/admin/exams')->with('message', 'Added Successful');
    }

    public function edit($id){
        $exam = Exam::find($id);
        return view('admin.exam.edit', ['exam' => $exam]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'pass' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $exam = Exam::find($id);

        $exam->title = $request->title;
        $exam->total = $request->total;
        $exam->pass = $request->pass;
        $exam->desc = $request->desc;
        $exam->time = $request->time;

        $exam->update();
        return redirect('/admin/exams')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect('/admin/exams')->with('message', 'Deleted Successful');
    }
}
