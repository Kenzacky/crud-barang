@extends('barangs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">Edit Barang</h2>
            <a class="btn btn-primary mb-3" href="{{ route('barangs.index') }}">Kembali</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" placeholder="Nama Barang">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Harga Satuan:</strong>
                    <input type="number" step="0.01" name="harga_satuan" value="{{ $barang->harga_satuan }}" class="form-control" placeholder="Harga Satuan">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="number" name="jumlah" value="{{ $barang->jumlah }}" class="form-control" placeholder="Jumlah">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi">{{ $barang->deskripsi }}</textarea>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Foto Saat Ini:</strong><br>
                    @if ($barang->foto)
                        <img src="{{ $barang->foto }}" alt="{{ $barang->nama_barang }}" style="max-width: 150px; height: auto;">
                    @else
                        Tidak ada foto
                    @endif
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Ganti Foto (Opsional):</strong>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection