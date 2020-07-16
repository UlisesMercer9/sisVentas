<?php

namespace Dulceria\Http\Controllers;

use Illuminate\Http\Request;

use Dulceria\Http\Requests;
use Dulceria\Http\Controllers\Controller;

class FrontController extends Controller
{
     public function index()
    {
        return view('index');
    }
}
