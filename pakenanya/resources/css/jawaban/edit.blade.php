@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Halaman Edit Jawaban</h4>
        <p class="card-description">
            Edit Jawaban Untuk Pertanyaan <strong>{{$jawaban->pertanyaan->judul}}</strong> 
        </p>
    <form action="/jawaban/{{$jawaban->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" value="{{$jawaban->pertanyaan->id}}" name="pertanyaan_id" >
        <div class="form-group">
            <textarea type="text" class="form-control" name="jawaban" placeholder="Masukkan jawaban anda">{{old('jawaban', $jawaban->jawaban)}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Jawaban</button>
    </form>
</div>
    </div>
</div>
@endsection
