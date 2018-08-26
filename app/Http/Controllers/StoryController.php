<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use Session;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('updated_at', 'desc')->get();
        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'image' => 'required',
            'slug' => 'required'
        ]);
        // Image handling
        // $image = $request->image;
        // $image_new_name = time().$image->getClientOriginalName();
        // $image->move('images/stories', $image_new_name);
        // *****
        $story = new Story;
        $story->title = $request->title;
        $story->body = $request->body;
        $story->image = $request->image;
        $story->slug = $request->slug;
        $story->save();
        Session::flash('success', 'Story created!');
        return redirect()->route('story.index');
    }

    public function show(Story $story, $id)
    {
        $story = Story::find($id);
        return view('admin.stories.show', compact('story'));
    }

    public function edit(Story $story)
    {
        //
    }

    public function update(Request $request, Story $story)
    {
        //
    }

    public function destroy(Story $story, $id)
    {
        $story = Story::find($id);
        $story->delete();
        Session::flash('success', 'Story deleted!');
        return redirect()->route('story.index');
    }
}
