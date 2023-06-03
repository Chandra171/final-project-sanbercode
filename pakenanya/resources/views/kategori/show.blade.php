@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Forum Programmer</h4>
        <h5 class="card-description">
            List Kategori #{{ $kategori->nama }}
        </h5>
<a href="/pertanyaan/create" class="btn btn-primary my-3">Tanya</a>
@if (session('msg'))
<div class="alert alert-success">
    <p> {{session('msg')}} </p>
</div>
@endif
<div class="row">
    @forelse ($kategori->pertanyaan as $item)
    <div class="col-4">
        <div class="card border shadow mb-3">
            <img class="card-img-top" src="{{asset('images/'. $item->gambar)}}" alt="Card image cap" width="100px" height="180px">
            <div class="card-body">
                <h5><a href="/pertanyaan/{{$item->id}}"  class="text-bold">{{$item->pertanyaan}}</a></h5>
                <h6 class="card-text">Penulis : {{$item->user->name}}</h6>
                <h6><a href="/kategori/{{$item->kategori->id}}"  class="text-bold"><button class="badge badge-warning">{{$item->kategori->nama}}</button></a></h6>
              <p class="card-text"><small class="text-muted">{{$item->created_at->diffForHumans()}}</small></p>
              @auth
              @if (Auth::user()->id == $item->user->id)
              <form action="/pertanyaan/{{$item->id}}" method="POST">
                  <a href="/pertanyaan/{{$item->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                      @csrf
                      @method('DELETE')
                      <input type="submit" class="btn btn-danger btn-sm my-1" value="Delete">
                  </form>
              @endif
              @endauth
            </div>
          </div>
    </div>
    @empty
    <h1>Tidak ada Pertanyaan</h1>
    @endforelse
</div>
      </div>
    </div>

@endsection