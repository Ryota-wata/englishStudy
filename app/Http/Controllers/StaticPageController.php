<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function top()
    {
        return view('static_page.top');
    }
}
