<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Avatar;
use App\Models\UserAvatar;
use App\Models\User;
use Illuminate\Support\Str;
use App\Filters\AvatarFilters;
use App\Services\MyService;
use Illuminate\Support\Facades\Auth;
use App\Transformers\Admin\AvatarTransformer;

class AvatarController extends Controller
{
    public function index(AvatarFilters $filters)
    {
        return view('Admin.Avatars.Index', [
            'avatars' => function () use($filters) {
                return fractal(Avatar::filter($filters)
                    ->orderBy('sort', 'asc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new AvatarTransformer())->toArray();
            }
        ]);
    }
    public function create()
    {
        return view('Admin.Avatars.Create');
    }
    public function edit($id)
    {
        $avatar = Avatar::findOrFail($id);
        return view('Admin.Avatars.Edit', ['avatar' => $avatar]);
    }
    public function update(Request $request, $id)
    {
        $avatar = Avatar::findOrFail($id);
        $has_sort = Avatar::where('sort', $request->sort)->count();
        if($has_sort > 1) {
            Avatar::where('sort', '>=', $request->sort)->increment('sort');
        }
        $is_active = $request->is_active == 'on' ? true : false;
        $data = [
            'title' => $request->title,
            'points' => $request->points,
            'description' => $request->description,
            'is_active' => $is_active,
            'sort' => $request->sort
        ];
        if(isset($request->avatar)){
            $photo = Str::slug($request->title).'_'.time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('images/avatars'), $photo);
            $photo_path = url('/').'/images/avatars/'.$photo;
            $data['path'] = $photo_path;
        }
        $avatar->update($data);
        $avatar->save();
        return redirect()->route('get_avatars')->with('success', 'true')->with('message', "Avatar has been successfully updated!");
    }
    public function upload(Request $request)
    {
        $has_sort = Avatar::where('sort', $request->sort)->count();
        if($has_sort > 0) {
            Avatar::where('sort', '>=', $request->sort)->increment('sort');
        }
        $is_active = $request->is_active == 'on' ? true : false;
        $photo = Str::slug($request->title).'_'.time().'.'.$request->avatar->extension();
        $request->avatar->move(public_path('images/avatars'), $photo);
        $photo_path = url('/').'/images/avatars/'.$photo;
        Avatar::create([
            'title' => $request->title,
            'path' => $photo_path,
            'points' => $request->points,
            'description' => $request->description,
            'is_active' => $is_active,
            'sort' => $request->sort
        ]);
        return redirect()->route('get_avatars')->with('success', 'true')->with('message', "Avatar has been successfully uploaded!");
    }

    public function buy($id, MyService $myService)
    {
        $total_coins = $myService->getTotalCoins();
        $avatar = Avatar::findOrFail($id);
        if($total_coins >= $avatar->points){
            UserAvatar::create(['avatar' => $id]);
            return redirect()->back()->with('success', 'Successfully purchased a new avatar!');
        } else {
            return redirect()->back()->with('error', 'Hustle for more coins to unlock this avatar!');
        }
        return redirect()->back()->with('error', 'Something went wrong!');
    }
    public function select($id, MyService $myService)
    {
        $user_avatar_count = UserAvatar::where("user", Auth::user()->id)->where("avatar", $id)->count();
        if($user_avatar_count > 0){
            UserAvatar::where('user', Auth::user()->id)->update(['is_selected' => 0]);
            $user_avatar = UserAvatar::where("user", Auth::user()->id)->where("avatar", $id)->first();
            $user = User::findOrFail(Auth::user()->id);
            $user_avatar->update(['is_selected' => 1]);
            $user->update(['avatar_selected' => 1]);
            $user_avatar->save();
            $user->save();
            $avatar = Avatar::findOrFail($id);
            return [
                'success' => true,
                'message' => 'successfully selected avatar',
                'path' => $avatar->path,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Avatar not in your list!',
            ];
        }
        return [
            'success' => false,
            'message' => 'Something went wrong!',
        ];
    }

    public function delete($id)
    {
        try {
            $avatar = Avatar::find($id);
            $sort = $avatar->sort;
            $users = UserAvatar::where('avatar', $id)->where('is_selected', 1)->pluck('user');
            User::whereIn('id', $users)->update(['avatar_selected' => 0]);
            UserAvatar::where('avatar', $id)->delete();
            $avatar->delete();
            Avatar::where('sort', '>', $sort)->decrement('sort');

        }
        catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('get_avatars')->with('success','false')->with('message','Something went wrong!');
        }
        return redirect()->route('get_avatars')->with('success','true')->with('message','Avatar has been successfully deleted!');
    }

}
