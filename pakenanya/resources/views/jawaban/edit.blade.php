@extends('layouts.master')
@push('scripts')
<script src="https://cdn.tiny.cloud/1/y0aei2hae802rnizhu7dvrnheypn7rvwfw3d2oao66re3c6t/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '' // Needed for 3.x
  });
</script>
@endpush

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Halaman Edit Jawaban</h4>
        <p class="card-description">
            Edit Jawaban Untuk Pertanyaan <strong>{{$jawaban->pertanyaan->pertanyaan}}</strong> 
        </p>
    <form action="/jawaban/{{$jawaban->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" value="{{$jawaban->pertanyaan->id}}" name="pertanyaan_id" >
        <div class="form-group">
            <textarea type="text" class="form-control" name="jawaban" placeholder="Masukkan jawaban anda">{{old('jawaban', $jawaban->jawaban)}}</textarea>
            @error('jawaban')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Jawaban</button>
    </form>
</div>
    </div>
</div>
@endsection

