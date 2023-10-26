@extends('layout/aplikasi')

@section('konten')
<form method="post" action="/item">
    @csrf
    <div class="mb-3">
      <label for="nomor_item" class="form-label">Nomor Item</label>
      <input type="text" class="form-control" name='nomor_item'
      id="nomor_item" value="{{Session::get('nomor_item')}}" >
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name='nama'
        id="nama" value="{{Session::get('nama')}}">
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control" name='kategori' 
        id="kategori" value="{{Session::get('kategori')}}">
      </div>
      <div class="mb-3"> 
         <button type="submit" class="btn btn-primary">SIMPAN</button>
         
      </div>
</form>
@endsection