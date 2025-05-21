@extends('barangs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">Detail Barang</h2>
            <a class="btn btn-primary mb-3" href="{{ route('barangs.index') }}">Kembali</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Kode Barang:</strong>
                {{ $barang->id }}
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                {{ $barang->nama_barang }}
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                {{ $barang->deskripsi }}
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Harga Satuan:</strong>
                Rp{{ number_format($barang->harga_satuan, 2, ',', '.') }}
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Jumlah:</strong>
                {{ $barang->jumlah }}
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <strong>Foto:</strong><br>
                @if ($barang->foto)
                    <img src="{{ $barang->foto }}" alt="{{ $barang->nama_barang }}" style="max-width: 250px; height: auto;">
                @else
                    Tidak ada foto
                @endif
            </div>
        </div>
    </div>
@endsection