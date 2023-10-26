<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    function index()
    {
        return view("halaman/index");
    }

    function about()
    {
        return view("halaman/about");
    }
    
    function contact()
    {
        return view("halaman/contact");
    }
}
