@extends('layout/aplikasi')

@section('konten')
<a href="/item/create" class="btn btn-primary">+Tambah Data Item</a>
<table class="table">
    <thead>
        <tr>
            <th>Nomor Item</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>
                {{$item->nomor_item}}
            </td>
            <td>
                {{$item->nama}}
            </td>
            <td>
                {{$item->kategori}}
            </td>
            <td>
                <a class='btn btn-secondary btn-sm'href='{{ url('/item/'.$item->nomor_item) }}'>Detail</a>
                <a class='btn btn-warning btn-sm'href='{{ url('/item/'.$item->nomor_item.'/edit') }}'>Edit</a>
                <form onsubmit="return confirm('Are you sure?')" class='d-inline' action="{{'item/'.$item->nomor_item}}"method='post'>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>

{{$data->links()}}
@endsection
