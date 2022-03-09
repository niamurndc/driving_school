<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $notices = Notice::all();
        return view('admin.notice.index', ['notices' => $notices]);
    }

    public function create(){
        return view('admin.notice.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'desc' => 'required|string'
        ]);

        $notice = new Notice();

        $notice->title = $request->title;
        $notice->desc = $request->desc;

        $notice->save();
        return redirect('/admin/notices')->with('message', 'Added Successful');
    }

    public function edit($id){
        $notice = Notice::find($id);
        return view('admin.notice.edit', ['notice' => $notice]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'desc' => 'required|string'
        ]);
        
        $notice = Notice::find($id);

        $notice->title = $request->title;
        $notice->desc = $request->desc;

        $notice->update();
        return redirect('/admin/notices')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $notice = Notice::find($id);
        $notice->delete();
        return redirect('/admin/notices')->with('message', 'Deleted Successful');
    }
}
