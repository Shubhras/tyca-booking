<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotdeskController extends Controller
{

    public function index($slot,$id)
    {
        return view('hotdesk.index');
    }
    //
}
