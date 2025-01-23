@extends('master')

@section('title')
@endsection

@section('content')
<div class="container">
    <div class="mt-4 mb-4">
        <form action="/penjualan/create" method="POST">
            @csrf
            <select name="id_pelanggan" id="" class="form-select mb-3" required>
                <option value="">Pilih Pelanggan</option>
                @foreach ($pelanggan as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_pelanggan }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success col-md-2" type="submit">Next</button>
        </form>
    </div>
</div>
@endsection
