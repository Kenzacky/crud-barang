@extends('barangs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">Tambah Barang Baru</h2>
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

    <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ old('nama_barang') }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Harga Satuan:</strong>
                    <input type="number" step="0.01" name="harga_satuan" class="form-control" placeholder="Harga Satuan" value="{{ old('harga_satuan') }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ old('jumlah') }}">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Foto:</strong>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
@endsection