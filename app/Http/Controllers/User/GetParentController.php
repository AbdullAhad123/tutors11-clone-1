<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Parent\ChangeChild;
use App\Models\UserGroupUsers;
use App\Models\User;

class GetParentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:student|guest']);
    }
    public function getParent()
    {
        $change_child = new ChangeChild;
        $include_in_user_group_name = $change_child->include_in_user_group_name;
        $user_group_names = auth()->user()->userGroups()->pluck("name");
        $user_group_ids = auth()->user()->userGroups()->pluck("id");
        $users = [];
        foreach ($user_group_names as $key => $value) {
            if (strpos(strtolower($value),strtolower($include_in_user_group_name))) {
                array_push($users,User::find(UserGroupUsers::where("user_group_id",$user_group_ids[$key])->get("user_id")));
            }
        }
        $parents = [];
        foreach ($users as $value) {
            foreach ($value as $key => $value) {
                if ($value->role_id == "parent") {
                    array_push($parents, ['email' => $value->email]);
                }
            }
        }
        return $parents;
    }
}
