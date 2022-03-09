<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class FrontUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('varify');
    }

    public function profile(){
        return view('user.profile');
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required|string',
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpg,png|max:2000'
        ]);

        $uid = auth()->user()->id;

        $user = User::find($uid);

        $user->name = $request->name;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'profile-'.time().'.'.$ext;
            $user->image = $cover;
            $path = 'uploads/profile';
            $image->move($path, $cover);
        }

        $user->update();

        return redirect()->back()->with('message', 'Profile Updated');
    }

    public function mycourse(){
        $uid = auth()->user()->id;

        $enroll = Enrollment::where('student_id', $uid)->get();
        return view('user.course', ['enrolls' => $enroll]);
    }

    
    public function certificate(){
        $uid = auth()->user()->id;

        $enroll = Enrollment::where('student_id', $uid)->where('status', 1)->get();
        return view('user.certificate', ['enrolls' => $enroll]);
    }

    public function getcertificate($id){

        $enroll = Enrollment::find($id);
        $setting = Setting::find(1);
        $customPaper = array(0,0,460.0,770.0);
        $pdf = PDF::loadView('user.print', ['enroll' => $enroll, 'setting' => $setting])->setPaper($customPaper, 'landscape');
        return $pdf->stream('invoice.pdf');
    }

    public function enrollment($id){
        $course = Course::find($id);
        return view('enrollment', ['course' => $course]);
    }

    public function submitOrder(Request $request, $id){
        $request->validate([
            'method' => 'required|string',
            'phone' => 'required|numeric'
        ]);

        $enroll = new Enrollment();

        $enroll->student_id = auth()->user()->id;
        $enroll->course_id = $id;
        $enroll->amount = $request->amount;
        $enroll->method = $request->method;
        $enroll->phone = $request->phone;
        $enroll->status = 0;

        $enroll->save();

        return redirect('/my-course')->with('message', 'অর্ডার সম্পন্ন হয়েছে, অনুমোদন এর জন্য অপেক্ষা করুন');
    }

    public function exam($id){
        $exam = Exam::find($id);
        return view('exam.index', ['exam' => $exam]);
    }


    public function submitExam(Request $request, $id){
        

        $exam = Exam::find($id);
        $i = 1;
        $marks = 0;
        foreach($exam->questions as $question){

            $ti = 'option'.$i;

            if($question->ans == $request->$ti){
                $marks += 1;
            }
            $i++;
        }
        $uid = auth()->user()->id;
        $phone = auth()->user()->phone;
        $text = 'আপনি পাশ করেছেন ';
        if($marks >= $exam->pass){
            SmsController::send_sms($phone, $text);
            $enrolls = Enrollment::where('student_id', $uid)->get();
            foreach($enrolls as $enroll){
                $enroll->marks = $marks;
                $enroll->certificate = 1;
                $enroll->update();
            }
        }
        

        return view('exam.result', ['exam' => $exam, 'marks' => $marks]);
    }
}
