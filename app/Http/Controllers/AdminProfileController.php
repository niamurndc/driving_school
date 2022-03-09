<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.profile');
    }

    public function edit(Request $request){
        $uid = auth()->user()->id;
        $user = User::find($uid);

        $user->name = $request->name;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }
        

        $user->update();
        return redirect('/admin/profile')->with('message', 'Updated Successful');

    }
}
