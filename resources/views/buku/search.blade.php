@extends('layout.master')

@section('content')
@if(count($data_buku))
<div class="container">
    <div class="alert alert-info" role="alert">Ditemukan {{ count($data_buku) }} data dengan kata: {{ $cari }}</div>
    @if(Session::has('pesan'))
    <div class="alert alert-info" role="alert">
        {{ Session::get('pesan') }}
    </div>
    @endif
    <h4>Data Buku</h4>

    <p align="right">
        <a href="{{ route('buku.create') }}">
            <button type="button" class="btn btn-primary">Tambah Buku</button>
        </a>
    </p>

    <form action="{{ route('buku.search') }}" method="get">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Search . . ." name="kata">
            </div>

        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>Rp. {{ number_format($buku->harga, 0, ',', '.') }}</td>
                <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('buku.edit', $buku->id) }}"> <button class="btn btn-warning">Edit</button>
                        <a href="{{ route('buku.destroy', $buku->id) }}" method="post"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
    <div align="right">{{ $data_buku->links() }}</div>
    @else
    <div>
        <h4>Data {{ $cari }} tidak ditemukan</h4>
        <a href="/buku">Kembali</a>
    </div>
    @endif
</div>
@endsection