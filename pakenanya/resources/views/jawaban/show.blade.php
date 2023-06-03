@extends('layouts.master')

@section('content')
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title d-inline-block">{{$jawaban->pertanyaan->pertanyaan}}</h4>
        @auth
        @if (Auth::user()->id == $jawaban->user_id)
        <i class="bi bi-three-dots-vertical float-right" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                  <form action="/jawaban/{{$jawaban->id}}" method="POST">
                      <a href="/jawaban/{{$jawaban->id}}/edit" class="dropdown-item">Edit</a>
                      @csrf
                      @method('DELETE')
                       <input type="submit" class="dropdown-item" value="Delete">
                  </form>
                </div>
        @endif
        @endauth
        <h6 class="card-text">Komentar dari: {{$jawaban->user->name}}</h6>
        <p class="card-text"><small class="text-muted">{{$jawaban->created_at->diffForHumans()}}</small></p>
        <p class="card-description">
            {!!$jawaban->jawaban!!}
        </p>


<a href="/pertanyaan/{{$jawaban->pertanyaan->id}}" class="btn btn-secondary btn-sm">Kembali</a>
      </div>
    </div>
</div>
@endsection
