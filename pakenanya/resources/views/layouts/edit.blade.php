@extends('layouts.master')

@section('title')
    Edit Data Game
@endsection

@section('content')
<div>
    <h2>Edit game {{$game->id}}</h2>
    <form action="/game/{{$game->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $game->name }}">
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gameplay">Gameplay:</label>
            <textarea type="text" rows="4" cols="50" class="form-control" name="gameplay" id="gameplay">{{ $game->gameplay }}</textarea>
            @error('gameplay')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="developer">Developer:</label>
            <input type="text" class="form-control" name="developer" id="developer" value="{{ $game->developer }}">
            @error('developer')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="year">Tahun:</label>
            <input type="text" class="form-control" name="year" id="year" value="{{ $game->year }}">
            @error('year')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    <br>
    <a href = "/game"><button class="btn btn-primary">Back</button></a>
</div>
@endsection