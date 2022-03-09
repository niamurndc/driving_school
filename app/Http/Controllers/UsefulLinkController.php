<?php

namespace App\Http\Controllers;

use App\Models\UsefulLink;
use Illuminate\Http\Request;

class UsefulLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $links = UsefulLink::all();
        return view('admin.link.index', ['links' => $links]);
    }

    public function create(){
        return view('admin.link.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'text' => 'required|string',
            'link' => 'required|string'
        ]);

        $link = new UsefulLink();

        $link->text = $request->text;
        $link->link = $request->link;

        $link->save();
        return redirect('/admin/links')->with('message', 'Added Successful');
    }

    public function edit($id){
        $link = UsefulLink::find($id);
        return view('admin.link.edit', ['link' => $link]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'text' => 'required|string',
            'link' => 'required|string'
        ]);
        
        $link = UsefulLink::find($id);

        $link->text = $request->text;
        $link->link = $request->link;

        $link->update();
        return redirect('/admin/links')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $link = UsefulLink::find($id);
        $link->delete();
        return redirect('/admin/links')->with('message', 'Deleted Successful');
    }
}
