<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Filters\BlogFilters;
use App\Filters\BlogCommentsFilters;
use App\Transformers\Admin\BlogTransformer;
use App\Transformers\Admin\BlogCommentsTransformer;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin|instructor']);
    }

    /**
     * List all assessment sections
     *
     * @param $assessment
     * @return \Inertia\Response
     */
    public function index(BlogFilters $filters)
    {
        return view('Admin/Blogs/Index', [
            'blogs' => function () use ($filters) {
                return fractal(Blog::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new BlogTransformer())->toArray();
            },
        ]);
    }
    public function viewComments(BlogCommentsFilters $filters, $id)
    {
        return view('Admin/Blogs/Comments', [
            'comments' => function () use ($filters, $id) {
                return fractal(BlogComment::filter($filters)
                    ->where('blog_id', $id)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new BlogCommentsTransformer())->toArray();
            },
            'blog' => Blog::findOrFail($id),
        ]);
    }

    public function create()
    {
        return view('Admin/Blogs/Create', [
            'test' => 'okay'
        ]);
    }
    public function update($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Admin/Blogs/Update', [
            'blog' => $blog
        ]);
    }

    public function store(Request $request)
    {
         // Validation rules
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Max size: 2MB
            // Add other validation rules for your fields here
        ];

        // Custom validation messages
        $messages = [
            'image.required' => 'Please select an image.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Supported image formats are: jpeg, png, jpg, webp.',
            'image.max' => 'The image size should be less than 2MB.',
            // Add other custom messages for validation rules here
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // If validation fails, redirect back with validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $slug_availability = Blog::where('slug', Str::slug($request->slug))->count();
        if($slug_availability > 0){
            return redirect()->back()->with('slug_exists','The requested slug is already in use. Please select a different slug.');
        }
        if($request->body == null){
            return redirect()->back()->with('null_body','Blog body field is required!');
        }
        // if ($request->hasFile('image') && $request->file('image')->getSize() > 2 * 1024 * 1024) {
        //     return redirect()->back()->with('image_size_error', 'The image size should be less than 2MB.');
        // }
        $image = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/blogs/'), $image);
        $image_path = 'images/blogs/'.$image;
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'category' => $request->catgeory,
            'author' => $request->author,
            'image' => $image_path,
            'body' => $request->body,
            'keywords' => $request->keywords,
            'meta_description' => $request->meta_description,
            'created_at' => $request->date,
        ];
        Blog::create($data);
        return redirect()->route('get_blogs')->with('success','true')->with('message','Blog created successfully!');
    } 
    
    public function edit(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $slug_availability = Blog::where('slug', Str::slug($request->slug))
            ->where('id', '!=', $id)
            ->count();

        if ($slug_availability > 0) {
            return redirect()->back()->with('slug_exists', 'The requested slug is already in use. Please select a different slug.');
        }
        if($request->body == null){
            return redirect()->back()->with('null_body','Blog body field is required!');
        }
        if(isset($request->image)){
            // Validation rules
            $rules = [
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Max size: 2MB
                // Add other validation rules for your fields here
            ];

            // Custom validation messages
            $messages = [
                'image.required' => 'Please select an image.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'Supported image formats are: jpeg, png, jpg, webp.',
                'image.max' => 'The image size should be less than 2MB.',
                // Add other custom messages for validation rules here
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules, $messages);

            // If validation fails, redirect back with validation errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('image') && $request->file('image')->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->with('image_size_error', 'The image size should be less than 2MB.');
            }
        }

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'category' => $request->catgeory,
            'author' => $request->author,
            'body' => $request->body,
            'keywords' => $request->keywords,
            'meta_description' => $request->meta_description
        ];

        if (isset($request->image)) {            
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs/'), $image);
            $image_path = 'images/blogs/' . $image;
            $data['image'] = $image_path;
        }

        if (isset($request->date)) {
            $data['created_at'] = $request->date;
        }

        $blog->update($data);

        return redirect()->route('get_blogs')->with('success', 'true')->with('message', 'Blog updated successfully!');
    }

    public function changeCommentStatus(Request $request , $id)
    {
        $comment = BlogComment::findOrFail($id);
        $status = $request->status == 'true' ? true : false;
        $comment->update(['is_active' => $status]);
        return [
            'success' => true,
            'message' => $status == true ? 'Comment Enabled Successfully!' : 'Comment Disabled Successfully!'
        ];
    }

    public function delete($id)
    {
        try {
            $blog = Blog::find($id);
            $blog->delete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('get_blogs')->with('success','false')->with('message','Something went wrong!');
        }
        return redirect()->route('get_blogs')->with('success','true')->with('message','Blog was successfully deleted!');
    }
}
