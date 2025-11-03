<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class UserController extends Controller
{

    public function welcome()
    {
        return view('user.welcome');
    }
    public function flower()
    {
        return view('user.flower');
    }
    public function letter()
    {
        return view('user.letter');
    }


    //
     public function dashboard()
    {
        $admin = Admin::all();
        return view('user.dashboard', compact('admin'));
    }
}
