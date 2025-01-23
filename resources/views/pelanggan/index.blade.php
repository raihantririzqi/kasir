@extends('master')

@section('title')
@endsection

@section('content')
<div class="container">
    <div class="mt-4">
        <a class="btn btn-primary" href="/pelanggan/create">Tambah</a>
    </div>
    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Pelanggan</td>
                    <td>Alamat</td>
                    <td>Nomor Telepon</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama_pelanggan }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->nomor_telepon }}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <a class="btn btn-success" href="/pelanggan/edit/{{ $row->id }}">Edit</a>
                            <form action="/pelanggan/delete/{{ $row->id }}" method="POST">
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
