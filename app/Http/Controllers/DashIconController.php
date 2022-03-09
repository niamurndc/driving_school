<?php

namespace App\Http\Controllers;

use App\Models\DashIcon;
use Illuminate\Http\Request;

class DashIconController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $dashicons = DashIcon::all();
        return view('admin.dashicon.index', ['dashicons' => $dashicons]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'desc' => 'nullable|string'
        ]);

        $dashicon = new DashIcon();

        $dashicon->title = $request->title;
        $dashicon->desc = $request->desc;

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'dashicon-'.time().'.'.$ext;
        $dashicon->image = $cover;
        $path = 'uploads/dashicon';
        $image->move($path, $cover);

        $dashicon->save();
        return redirect('/admin/dashicons')->with('message', 'Added Successful');
    }

    public function edit($id){
        $dashicon = DashIcon::find($id);
        return view('admin.dashicon.edit', ['dashicon' => $dashicon]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'desc' => 'nullable|string'
        ]);
        
        $dashicon = DashIcon::find($id);

        $dashicon->title = $request->title;
        $dashicon->desc = $request->desc;

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'dashicon-'.time().'.'.$ext;
            $dashicon->image = $cover;
            $path = 'uploads/dashicon';
            $image->move($path, $cover);
        }

        $dashicon->update();
        return redirect('/admin/dashicons')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $dashicon = DashIcon::find($id);
        $dashicon->delete();
        return redirect('/admin/dashicons')->with('message', 'Deleted Successful');
    }
}
