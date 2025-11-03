<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class MemoriesController extends Controller
{

    public function index(){
        $memories = Admin::all();

        // kirim ke tampilan
        return view('user.memories', compact('memories'));


    }
    
}
