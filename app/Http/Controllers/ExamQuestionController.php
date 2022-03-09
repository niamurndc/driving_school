<?php

namespace App\Http\Controllers;

use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function store(Request $request, $id){
        $request->validate([
            'text' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'ans' => 'required|numeric',
        ]);

        $eq = new ExamQuestion();

        $eq->text = $request->text;
        $eq->option1 = $request->option1;
        $eq->option2 = $request->option2;
        $eq->option3 = $request->option3;
        $eq->option4 = $request->option4;
        $eq->ans = $request->ans;
        $eq->exam_id = $id;

        $eq->save();
        return redirect()->back()->with('message', 'Added Successful');
    }

    public function delete($id){
        $exam = ExamQuestion::findOrFail($id);
        $exam->delete();
        return redirect()->back()->with('message', 'Deleted Successful');
    }
}
