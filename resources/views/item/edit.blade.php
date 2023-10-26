@extends('layout/aplikasi')

@section('konten')
<a href='/item' class="btn btn-secondary"><< Kembali </a>
<form method="post" action="{{ '/item/'.$data->nomor_item}}">
    @csrf
    @method('put')
    <div class="mb-3">
      <h1>Nomor Item: {{ $data->nomor_item}}</h1>
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name='nama'
        id="nama" value="{{ $data->nama }}">
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control" name='kategori' 
        id="kategori" value="{{$data->kategori}}">
      </div>
      <div class="mb-3"> 
         <button type="submit" class="btn btn-primary">UPDATE</button>
         
      </div>
</form>
@endsection