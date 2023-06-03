@extends('layouts.master')

@section('title')
    Halaman Detail Game
@endsection

@section('content')
    
<h2 style="color: blueviolet">{{$game->name}}&nbsp;&nbsp;({{$game->year}})</h2>
<p>Developer : {{$game->developer}}</>
<h5>Gameplay</h5>
<p white-space: normal>{{$game->gameplay}}</p>

Platform <br>
@forelse ($platform as $key => $value)
<label class="btn btn-primary btn-sm mb-5">{{$value->name}}</label>
@empty
<label class="btn btn-primary btn-sm mb-5">Platform No Input</label>
@endforelse


<br><br>
<a href="/game/{{$game->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
<a href="/game" class="btn btn-primary btn-sm">Back</a>

@endsection
