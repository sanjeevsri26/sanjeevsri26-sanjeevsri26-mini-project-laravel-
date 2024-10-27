<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blogs;  // Use the correct model name
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class blogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blogs::all();
        
        return view('Admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $request->validate([
            'blogstitle' => 'required|string|max:255',
            'blogsContent' => 'required|string',
            'blogsimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ]);

        if ($request->hasFile('blogsimage')) {
            //get filename with extension
            $filenameWithExt = $request->file('blogsimage')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('blogsimage')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('blogsimage')->move(public_path('/storage/blogs'), $fileNameToStore);
        }

        // Create a new Products instance
        $blogs = new blogs;
        $blogs->blogstitle = $request->input('blogstitle');
        $blogs->blogsContent = $request->input('blogsContent');
        $blogs->blogsImage = $fileNameToStore;
        $blogs->save();

        return redirect('blogs')->with('success', 'Successfully Added');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blog)
    {
        return view('Admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(blogs $blog)
    {
          // Return the edit view
        return view('Admin.blogs.edit', compact('blog'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, blogs $blog)
    {
        $request->validate([
            'blogstitle' => 'required',
            'blogsContent' => 'required',
            'blogsimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    
        ]);

        // Update other fields
        $blog->blogstitle = $request->input('blogstitle');
        $blog->blogsContent = $request->input('blogsContent');
        
        // Handle image upload
        if ($request->hasFile('blogsimage')) {
            $image = $request->file('blogsimage');
            $fileNameToStore = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->move(public_path('/storage/blogs'), $fileNameToStore);

            // Update the image path in the database
            $blog->blogsimage = $fileNameToStore;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('message', 'blog Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $blog = Blogs::find($id);

        if ($blog) {
            $blog->forceDelete();

            // Adjust the redirect URL as needed
            return redirect('blogs')->with('message', 'Product Deleted!');
        } else {
            // Handle the case where the product with the given ID was not found
            return redirect('blogs')->with('message', 'Product not found.');
        }
    }
}

