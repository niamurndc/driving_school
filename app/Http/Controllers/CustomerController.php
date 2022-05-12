<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $customers = User::all();
        return view('admin.customer.index', ['customers' => $customers]);
    }

    public function edit($id){
        $user = User::find($id);

        if($user->status == 0){
            $user->status = 1;
        }else if($user->status == 1){
            $user->status = 0;
        }

        $user->update();
        return redirect()->back()->with('message', 'Updated Successful');

    }
}
