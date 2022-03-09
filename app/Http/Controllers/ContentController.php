<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function add($id){
        $course = Course::find($id);
        return view('admin.content.add', ['course' => $course]);
    }

    public function store(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|max:5124',
            'type' => 'required|string',
            'desc' => 'nullable|string',
        ]);

        $content = new Content();

        $content->title = $request->title;
        $content->type = $request->type;
        $content->desc = $request->desc;
        $content->course_id = $id;

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'content-'.time().'.'.$ext;
            $content->image = $cover;
            $path = 'uploads/content';
            $image->move($path, $cover);
        }

        $content->save();
        return redirect('/admin/course/view/'.$id)->with('message', 'Added Successful');
    }

    public function edit($id){
        $content = Content::find($id);
        $course = Course::find($content->course_id);
        return view('admin.content.edit', ['content' => $content, 'course' => $course]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|max:5124',
            'type' => 'required|string',
            'desc' => 'nullable|string',
        ]);

        $content = Content::find($id);

        $content->title = $request->title;
        $content->type = $request->type;
        $content->desc = $request->desc;

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'content-'.time().'.'.$ext;
            $content->image = $cover;
            $path = 'uploads/content';
            $image->move($path, $cover);
        }

        $content->update();
        return redirect('/admin/course/view/'.$content->course_id)->with('message', 'Updated Successful');
    }

    public function delete($id){
        $content = Content::findOrFail($id);
        $content->delete();
        return redirect()->back()->with('message', 'Deleted Successful');
    }
}
