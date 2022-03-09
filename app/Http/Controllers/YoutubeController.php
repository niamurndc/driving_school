<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $youtubes = Youtube::all();
        return view('admin.youtube.index', ['youtubes' => $youtubes]);
    }

    public function create(){
        return view('admin.youtube.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'desc' => 'required|string'
        ]);

        $youtube = new Youtube();

        $youtube->title = $request->title;
        $youtube->desc = $request->desc;

        $youtube->save();
        return redirect('/admin/youtubes')->with('message', 'Added Successful');
    }

    public function edit($id){
        $youtube = Youtube::find($id);
        return view('admin.youtube.edit', ['youtube' => $youtube]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'desc' => 'required|string'
        ]);
        
        $youtube = Youtube::find($id);

        $youtube->title = $request->title;
        $youtube->desc = $request->desc;

        $youtube->update();
        return redirect('/admin/youtubes')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $youtube = Youtube::find($id);
        $youtube->delete();
        return redirect('/admin/youtubes')->with('message', 'Deleted Successful');
    }
}
