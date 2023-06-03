@extends('layouts.master')

@section('content')
<form action="/profile/{{$profile->id}}" method="POST">
    @csrf
    @method('put')
    
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" disabled value="{{$profile->users->name}}" >
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" disabled value="{{$profile->users->email}}" >
    </div>

    <div class="form-group">
        <label>Umur</label>
        <div class="input-group">
            <input type="number" class="form-control" name="umur" value="{{old('umur', $profile->umur)}}">
            <div class="input-group-prepend">
                <span class="input-group-text">Tahun</span>
            </div>
        </div>
    </div>
    @error('umur')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" >{{old('alamat', $profile->alamat)}}</textarea>
    </div>
    @error('alamat')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Biodata</label>
        <textarea name="bio" class="form-control" rows="6" >{{old('bio', $profile->bio)}}</textarea>
    </div>
    @error('bio')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
    <a href="/pertanyaan" class="btn btn-light"> Kembali </a>
</form>

@endsection