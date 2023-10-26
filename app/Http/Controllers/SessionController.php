<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view("sesi/index");
    }

    function login(Request $request){
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)) {
            //Jika otentikasi sukses
            return redirect('item')->with('success','Berhasil Login');
        } else {
            //kalau gagal
            // return 'gagal';
            return redirect('sesi')->withErrors('Email dan password yang dimasukkan tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil Logout');
    }

    function register(){
        return view('sesi/register');
    }

    function create(Request $request){  
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'Nama Wajib diisi',
            'email.required'=>'Email Wajib diisi',
            'email.email'=>'Silahkan masukkan email yang valid',
            'email.unique'=>'Email sudah pernah digunakan, Silahkan pilih email yang lain',
            'password.required'=>'Password wajib diisi',
            'passowrd.min'=>'Minimum Passowrd yang diizinkan adalah 6 karakter'
        ]);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(auth::attempt($infologin)) {
            //Jika otentikasi sukses
            return redirect('item')->with('success', Auth::user()->name.'Berhasil Login');
        } else {
            //kalau gagal
            // return 'gagal';
            return redirect('sesi')->withErrors('Email dan password yang dimasukkan tidak valid');
        }
    }
}
