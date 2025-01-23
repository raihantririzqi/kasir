@extends('master')

@section('title')
@endsection

@section('content')
    <div class="container mt-4">
        <div class="border border-2 p-4 rounded mb-3">
            <div class="fs-1">
                Rp.{{ number_format($total_harga, 2, ',', '.') }}
            </div>
        </div>
        @if(session('error'))
            <div class="d-flex justify-content-center">
                <div class="bg-danger col-md-3 text-center text-white rounded-3 fs-4">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <div>
            <form action="/transaksi/{{ $id }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col">
                        <div>
                            <label for="">Produk</label>
                            <select name="id_produk" id="" class="form-control">
                                <option value="">Select Produk</option>
                                @foreach ($produk as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col">
                        <div class="d-flex flex-column">
                            <label for="">Jumlah</label>
                            <input for="" name="jumlah" class="form-control"/>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Tambah</button>
            </form>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>Nama Produk</td>
                        <td>Sub Total Harga</td>
                        <td>Jumlah Produk</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_penjualan as $row)
                    <tr>
                        <td>{{ $row->nama_pelanggan }}</td>
                        <td>{{ $row->nama_produk }}</td>
                        <td>Rp.{{ number_format($row->sub_total, 2, ',', '.') }}</td>
                        <td>{{ $row->jumlah_produk }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
