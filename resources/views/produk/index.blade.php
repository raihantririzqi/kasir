@extends('master')

@section('title')
@endsection

@section('content')
<div class="container">
    <div class="mt-4">
        <a class="btn btn-primary" href="/produk/create">Tambah</a>
    </div>
    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Produk</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama_produk }}</td>
                    <td>{{ number_format($row->harga, 2, ',', '.') }} </td>
                    <td>{{ $row->stok }}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <a class="btn btn-success" href="/produk/edit/{{ $row->id }}">Edit</a>
                            <form action="/produk/delete/{{ $row->id }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
