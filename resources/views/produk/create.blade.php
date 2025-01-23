@extends('master')

@section('title')
@endsection

@section('content')
<div class="container">
    <div class="mt-4">
        <a class="btn btn-primary" href="/produk">Back</a>
    </div>
    <div class="mt-4">
        <form action="/produk/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk">
            </div>
            <div class="mb-3">
                <label for="">Harga</label>
                <input type="text" class="form-control" name="harga">
            </div>
            <div class="mb-3">
                <label for="">Stok</label>
                <input type="text" class="form-control" name="stok">
            </div>
            <div>
                <button class="btn btn-primary col-md-2" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
