<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\item;

class ItemController extends Controller
{
    //
    function index()
    {
        $data = item::all();
        $data=item::orderBy('nomor_item','asc')->paginate(1);
        return view('item/index')->with('data',$data);
    }

    function detail($id)
    {
        //return "<h1> Item $id saat ini belum tersedia </h1>";
        $data=item::where('nomor_item',$id)->first();
        return view('item/show')->with('data',$data);
    }

    function create(){
         
    }

    function delete(){
        
    }
}
