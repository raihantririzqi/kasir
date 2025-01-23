@extends('master')

@section('title')
@endsection

@section('content')
<div class="container">
    <div class="mt-4">
        <a class="btn btn-primary" href="/pelanggan">Back</a>
    </div>
    <div class="mt-4">
        <form action="/pelanggan/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="">Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama_pelanggan">
            </div>
            <div class="mb-3">
                <label for="">Alamat</label>
                <textarea type="text" class="form-control" name="alamat"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Nomor Telepon</label>
                <input type="text" class="form-control" name="nomor_telepon">
            </div>
            <div>
                <button class="btn btn-primary col-md-2" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
