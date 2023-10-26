<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = item::all();
        $data=item::orderBy('nomor_item','asc')->paginate(5);
        return view('item/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_item',$request->nomor_item);
        Session::flash('nama',$request->nama);
        Session::flash('kategori',$request->kategori);


        $request->validate([
            'nomor_item'=>'required|numeric',
            'nama'=>'required',
            'kategori'=>'required'
        ],[
            'nomor_item.required'=>'Nomor Item Wajib Di Isi',
            'nomor_item.numeric'=>'Nomor Item Wajib Di Isi Dalam Angka',
            'nama.required'=>'Nama Wajib Di Isi',
            'kategori.required'=>'Kategori Wajib Di Isi',
        ]);
        $data=[
            'nomor_item'=>$request->input('nomor_item'),
            'nama'=>$request->input('nama'),
            'kategori'=>$request->input('kategori'),
        ];
        item::create($data);
        return redirect('item')->with('success','Berhasil memasukkan data');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return "<h1> Item $id saat ini belum tersedia </h1>";
        $data=item::where('nomor_item',$id)->first();
        return view('item/show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=item::where('nomor_item',$id)->first();
        
        return view('item/edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'kategori'=>'required'
        ],[
            'nomor_item.numeric'=>'Nomor Item Wajib Di Isi Dalam Angka',
            'nama.required'=>'Nama Wajib Di Isi',
            'kategori.required'=>'Kategori Wajib Di Isi',
        ]);
        $data=[
            'nama'=>$request->input('nama'),
            'kategori'=>$request->input('kategori'),
        ];
        item::where('nomor_item',$id)->update($data);
        return redirect('/item')->with('success','Berhasil Melakukan Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        item::where('nomor_item',$id)->delete();
        return redirect('/item')->with('success','Berhasil Menghapus Data');
    }
}
