@extends('layouts.master')

@section('content')
    
<div>
    <h2>Edit Kategori {{$kategori->id}}</h2>
    <form action="/kategori/{{$kategori->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" class="form-control" name="nama" value="{{$kategori->nama}}" id="nama" placeholder="Masukkan Kategori">
            @error('nama')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection