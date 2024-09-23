<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $blogs = Blog::orderBy('priority')->get();
        return view('blogs.create', compact('blogs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required',
            'status' => 'required',
            'photopath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/blogs/'), $photoname);
        $data['photopath'] = $photoname;

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog Created Successfully');
    }

    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('blogs.edit', compact('blogs'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority' => 'required',
            'status' => 'required',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $blogs = Blog::findOrFail($id);

        // Retain existing photo if no new photo is uploaded
        $data['photopath'] = $blogs->photopath;

        if ($request->hasFile('photopath')) {
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/blogs'), $photoname);
            $data['photopath'] = $photoname;

            // Delete old photo if exists
            $oldPhotoPath = public_path('images/blogs/' . $blogs->photopath);
            if (file_exists($oldPhotoPath) && $blogs->photopath)
            {

                    unlink($oldPhotoPath);

            }
        }

        $blogs->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete associated photo
        $photoPath = public_path('images/blogs/' . $blog->photopath);
        if (file_exists($photoPath) && $blog->photopath) {
            unlink($photoPath);
        }

        $blog->delete();

        return redirect()->back()->with('success', 'Blog Deleted Successfully');
    }


}
