<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function letter()
    {
        return view('user.letter', compact('letter'));
    }
}
