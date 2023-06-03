@extends('layouts.master')

@section('content')
<h2>Tambah Data</h2>
<form action="/kategori" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Kategori</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Kategori">
        @error('nama')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection