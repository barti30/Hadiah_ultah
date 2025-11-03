<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class GaleriController extends Controller
{
    public function index(){
        $videos = Admin::whereNotNull('video')->get();

        // kirim ke tampilan
        return view('user.galeri', compact('videos'));


    }
    
}
