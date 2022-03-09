<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $feature = Feature::find(1);
        return view('admin.feature', ['feature' => $feature]);
    }

    public function edit(Request $request){
        $request->validate([
            'about_desc' => 'required|string',
            'msg_desc' => 'required|string',
            'about_img' => 'nullable|image|max:2000',
            'msg_img' => 'nullable|image|max:2000',
        ]);

        $feature = Feature::find(1);

        $feature->about_desc = $request->about_desc;
        $feature->msg_desc = $request->msg_desc;

        $image = $request->file('about_img');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'about-'.time().'.'.$ext;
            $feature->about_image = $cover;
            $path = 'uploads/feature';
            $image->move($path, $cover);
        }

        $image1 = $request->file('msg_img');
        if($image1 != null){
            $ext = $image1->getClientOriginalExtension();
            $cover = 'msg-'.time().'.'.$ext;
            $feature->msg_image = $cover;

            //dd($cover);
            $path = 'uploads/feature';
            $image1->move($path, $cover);
        }


        $feature->save();
        return redirect('/admin/feature')->with('message', 'Updated Successful');

    }
}
