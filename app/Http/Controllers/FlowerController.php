<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function flower()
    {
        return view('user.flower', compact('flower'));
    }
}
