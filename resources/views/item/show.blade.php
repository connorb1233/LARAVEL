@extends('layout/aplikasi')

@section('konten')
    <div>
        <a href='/item' class="btn btn-secondary"><< Kembali</a>
        <h1>{{ $data->nama }}</h1>
        <p>
                <b>Nomor Item</b> {{$data->nomor_item}}
        </p>
        <p>
                <b>Kategori</b> {{$data->kategori}}
        </p>
    </div>
@endsection
