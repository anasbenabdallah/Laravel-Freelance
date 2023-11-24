<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Blog::query();

        // Search by titres
        if ($request->has('title')) {
            $title = $request->input('title');
            $query->where('title', 'LIKE', "%$title%")
                  ->orWhere('title', 'LIKE', "%$title%", 'COLLATE utf8_general_ci');
        }


        $blogs = $query->get();  // Fetch filtered records
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'A title is essential for the blog.',
            'title.max' => 'The title must be less than 255 characters.',
            'description.required' => 'Please provide a description for the blog.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, or gif.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);
    
        $data['user_id'] = auth()->id(); // Assuming you have authentication set up.

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(200, 200)->save($location);
    
            $data['image'] = $filename;
        }
    
        Blog::create($data);
    
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs = Blog::with('comments')->find($id);
        return view('blogs.show', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = Blog::find($id);
        return view('blogs.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blogs = Blog::find($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $blogs->update($data);
    
        return redirect()->route('blogs.show', $blogs)->with('flash_message', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->route('blogs.index')->with('flash_message', 'blog deleted successfully');
    }
}
