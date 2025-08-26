<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Filters\ReviewFilters;
use App\Transformers\Admin\ReviewTransformer;

class ReviewController extends Controller
{

    /**
     * List all assessment sections
     *
     * @param $assessment
     * @return \Inertia\Response
     */

    public function getMoreReviews(Request $request)
    {
        return [
            'reviews' => fractal(Review::paginate(4), new ReviewTransformer())->toArray()
        ];
    }
    public function index(ReviewFilters $filters)
    {
        return view('Admin/Reviews/Index', [
            'reviews' => function () use ($filters) {
                return fractal(Review::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new ReviewTransformer())->toArray();
            },
        ]);
    }

    public function create()
    {
        return view('Admin/Reviews/Create', [
            'test' => 'okay'
        ]);
    }
    public function update($id)
    {
        $review = Review::findOrFail($id);
        return view('Admin/Reviews/Update', [
            'review' => $review
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'message' => $request->message,
            'rating' => $request->rating,
            'date' => $request->date,
        ];
        if(isset($request->user_image)){
            $data['user_image'] = $request->user_image;
        }
        Review::create($data);
        return redirect()->route('get_reviews')->with('success','true')->with('message','Review created successfully!');
    } 
    
    public function edit(Request $request , $id)
    {
        $review = Review::findOrFail($id);
        $data = [
            'name' => $request->name,
            'message' => $request->message,
            'rating' => $request->rating,
        ];
        if(isset($request->user_image)){
            $data['user_image'] = $request->user_image;
        }
        if(isset($request->date)){
            $data['date'] = $request->date;
        }
        $review->update($data);
        return redirect()->route('get_reviews')->with('success','true')->with('message','Review updated successfully!');
    } 

    public function delete($id)
    {
        try {
            $review = Review::find($id);
            $review->delete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Something went wrong!',
            ];
            return redirect()->route('get_reviews')->with('success','false')->with('message','Something went wrong!');
        }
        return redirect()->route('get_reviews')->with('success','true')->with('message','Review was successfully deleted!');
    }
}
