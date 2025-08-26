<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pancontroller extends Controller
{
    //

    public function sidebar(){
        return view('parentsidebar.login');
    }
}
