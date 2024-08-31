<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog_mgt', compact('blogs'));
    }

    public function show($id)
    {   
        $blog = Blog::findOrFail($id);
        return view('blog-details', compact('blog'));
    }

    public function fetchBlogs()
    {
        $blogs = Blog::all();
        return view('blogs', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
        {
            // Validate the incoming request
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            // Handle the file upload
            if ($request->hasFile('image')) {
                $filename = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads'), $filename);

                // Create a new record in the database
                Blog::create([
                    'image' => $filename,
                    'title' => $request->title,
                    'content' => $request->content,
                ]);

                return redirect()->route('admin.blogs')->with('success', 'Blog added successfully.');
            }

            return redirect()->route('admin.blogs')->with('error', 'Failed to upload image.');
        }


    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        // Find the blog by its ID
        $blog = Blog::findOrFail($id);

       
    
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

    
        // Handle the file upload if a new image is provided
        if ($request->hasFile('image')) {
    
            // Delete the old image if it exists
            if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
                unlink(public_path('uploads/' . $blog->image));
            }
    
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $filename);
    
            // Update the blog with the new image
            $blog->image = $filename;
        }
    
        // Update the blog details
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
    
        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');
    }
    

    public function destroy($id)
    {   
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully.');
    }

    // public function show($id)
    //     {
    //         $blog = Blog::findOrFail($id);
    //         return view('admin.blogs.show', compact('blog'));
    //     }


    public function showComments($id)
    {
        $blog = Blog::findOrFail($id);
        $comments = $blog->comments;
        return view('admin.blog_comments', compact('blog', 'comments'));
    }


    public function comment(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $comment = new BlogComment();
        $comment->blog_id = $blog->id;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('blog.show', $blog->id)->with('success', 'Comment added successfully.');
    }

    // <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary mt-auto">Read More</a>

    public function deleteComment($id)
        {
            $comment = BlogComment::findOrFail($id);
            $comment->delete();

            return redirect()->back()->with('success', 'Comment deleted successfully.');
        }


}
