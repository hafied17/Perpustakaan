@extends('layout.master')

@section('content')
<div class="container">
    <h4>Tambah Buku</h4>
    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="{{ route('buku.update', $buku->id) }}">
        @csrf
        <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="penulis" value="{{ $buku->penulis }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="harga" value="{{ $buku->harga }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_terbit" class="col-sm-2 col-form-label">Tgl. Terbit</label>
            <div class="col-sm-10">
                <input type="date" class="date form-control" name="tgl_terbit" value="{{ date('Y-d-m',strtotime($buku->tgl_terbit)) }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/buku"><button type="button" class="btn btn-warning">Batal</button></a>
            </div>

        </div>

    </form>
</div>
@endsection