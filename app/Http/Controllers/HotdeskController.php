<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotdeskController extends Controller
{

    public function index($id)
    {
        return view('hotdesk.index');
    }
    //
}
