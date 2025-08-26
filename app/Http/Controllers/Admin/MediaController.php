<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Media;
use Illuminate\Support\Str;
use App\Transformers\Admin\MediaTransformer;

class MediaController extends Controller
{
    public function index()
    {
        return view('Admin/Media/Index', [
            'media' => fractal(Media::orderBy('created_at', 'desc')
            ->paginate(request()->perPage != null ? request()->perPage : 10),
            new MediaTransformer())->toArray()
        ]);
    }
    // Please choose a file in either JPG, JPEG, PNG, WEBP, or PDF format!
    public function upload(Request $request)
    {
        if (in_array($request->photo->extension(), ['jpg', 'jpeg', 'png', 'webp', 'pdf'])) {
            $photo = Str::slug($request->title).'_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/question_media'), $photo);
            $photo_path = '/images/question_media/'.$photo;
            Media::create([
                'path' => $photo_path,
                'title' => $request->title,
                'created_by' => auth()->user()['id'],
            ]);
            return redirect()->route('get_media')->with('success', 'true')->with('path', $photo_path);
        } else {
            return redirect()->back()->with('error', 'Please choose a file in either JPG, JPEG, PNG, WEBP, or PDF format!');
        }
    }

}
