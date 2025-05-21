@extends('barangs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">Daftar Barang</h2>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <a class="btn btn-success mb-3" href="{{ route('barangs.create') }}">Tambah Barang Baru</a>
            
            {{-- PINDAHKAN KODE INI KE SINI --}}
            @php
                $i = ($barangs->currentPage() - 1) * $barangs->perPage();
            @endphp
            {{-- AKHIR KODE YANG DIPINDAHKAN --}}

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th width="280px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ ++$i }}</td> {{-- Sekarang $i sudah didefinisikan --}}
                            <td>
                                @if ($barang->foto)
                                    <img src="{{ $barang->foto }}" alt="{{ $barang->nama_barang }}" style="max-width: 100px; height: auto;">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>Rp{{ number_format($barang->harga_satuan, 2, ',', '.') }}</td>
                            <td>{{ $barang->jumlah }}</td>
                            <td>
                                <form action="{{ route('barangs.destroy',$barang->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('barangs.show',$barang->id) }}">Detail</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('barangs.edit',$barang->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $barangs->links('pagination::bootstrap-5') !!} {{-- Untuk pagination --}}
        </div>
    </div>
@endsection