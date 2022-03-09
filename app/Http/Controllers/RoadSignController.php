<?php

namespace App\Http\Controllers;

use App\Models\RoadSign;
use Illuminate\Http\Request;

class RoadSignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $icons = RoadSign::all();
        return view('admin.icon.index', ['icons' => $icons]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'nullable|string',
            'section' => 'required|string'
        ]);

        $icon = new RoadSign();

        $icon->title = $request->title;
        $icon->section = $request->section;

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'icon-'.time().'.'.$ext;
        $icon->image = $cover;
        $path = 'uploads/icon';
        $image->move($path, $cover);

        $icon->save();
        return redirect('/admin/icons')->with('message', 'Added Successful');
    }

    public function edit($id){
        $icon = RoadSign::find($id);
        return view('admin.icon.edit', ['icon' => $icon]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'nullable|string',
            'section' => 'required|string'
        ]);
        
        $icon = RoadSign::find($id);

        $icon->title = $request->title;
        $icon->section = $request->section;

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'icon-'.time().'.'.$ext;
            $icon->image = $cover;
            $path = 'uploads/icon';
            $image->move($path, $cover);
        }

        $icon->update();
        return redirect('/admin/icons')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $icon = RoadSign::find($id);
        $icon->delete();
        return redirect('/admin/icons')->with('message', 'Deleted Successful');
    }
}
