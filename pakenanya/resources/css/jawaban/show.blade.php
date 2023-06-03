@extends('layouts.master')

@section('content')
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title d-inline-block">{{$jawaban->pertanyaan->pertanyaan}}</h4>

<a href="/pertanyaan/{{$jawaban->pertanyaan->id}}" class="btn btn-secondary btn-sm">Kembali</a>
      </div>
    </div>
</div>
@endsection
