@extends('layouts.master')

@section('title')
    Tambah data game
@endsection

@section('content')
<div>
    <h2>Tambah Data</h2>
        <form action="/game" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Game Name">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gameplay">Gameplay:</label>
                <textarea rows="4" cols="50" class="form-control" name="gameplay" id="gameplay" placeholder="Masukkan Gameplay"></textarea>
                @error('gameplay')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="developer">Developer:</label>
                <input type="text" class="form-control" name="developer" id="developer" placeholder="Masukkan Developer Game">
                @error('developer')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="year">Tahun:</label>
                <input type="text" class="form-control" name="year" id="year" placeholder="Masukkan Tahun Rilis">
                @error('year')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
        <br>
        <a href = "/game"><button class="btn btn-primary">Back</button></a>
</div>
@endsection