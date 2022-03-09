<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $enrollments = Enrollment::all();
        return view('admin.enrollment', ['enrollments' => $enrollments]);
    }

    public function edit($id){
        $enroll = Enrollment::find($id);

        $user = User::find($enroll->student_id);

        if($enroll->status == 0){
            $enroll->status = 1;
            $text = 'আপনার কোর্স পেমেন্ট সফল';
            $phone = $user->phone;

            SmsController::send_sms($phone, $text);

        }else if($enroll->status == 1){
            $enroll->status = 2;
        }else{
            $enroll->status = 0;
        }

        $enroll->update();
        return redirect()->back()->with('message', 'Updated Successful');

    }

    public function delete($id){
        $enroll = Enrollment::find($id);
        $enroll->delete();
        return redirect()->back()->with('message', 'Deleted Successful');
    }
}
