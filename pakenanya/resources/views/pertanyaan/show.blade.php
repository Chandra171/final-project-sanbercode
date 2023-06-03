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
  });
</script>
@endpush

@section('title')
    Detail Pertanyaan
@endsection

@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
        <div class="card-body">
            @auth
            @if (Auth::user()->id == $pertanyaan->user->id)
            <i class="bi bi-three-dots-vertical float-right" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
            <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
                <a href="/pertanyaan/{{$pertanyaan->id}}/edit" class="dropdown-item">Edit</a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="dropdown-item" value="Delete">
                </form>
            </div>
            @endif
            @endauth
            <h4 class="card-description">{{$pertanyaan->pertanyaan}}</h4>
            <h6 class="card-text">Ditulis oleh : {{$pertanyaan->user->name}}</h6>
            <p class="card-text"><small class="text-muted">{{$pertanyaan->created_at->diffForHumans()}}</small></p>
            <img src="{{asset('images/'. $pertanyaan->gambar)}}" style="width: 100vh; height: 400px" alt="">
    <p class="text-left">Kategori : {{$pertanyaan->kategori->nama}}</p>

    <a href="/pertanyaan" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
        </div>
    </div>

    <h3 class="m-4">Jawaban</h3>
    @forelse ($pertanyaan->jawaban as $item)
        <div class="col-lg-12 stretch-card my-3">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title d-inline-block">{{$item->user->name}}</h4>
            <i class="bi bi-three-dots-vertical float-right" id="dropdownMenuIconButton7" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"></i>
                
            <p class="card-text"><small class="text-muted">{{$item->created_at->diffForHumans()}}</small></p>
            <p class="card-description">
                {!!Str::limit($item->jawaban, 1000)!!}
            </p>
            @auth
                @if (Auth::user()->id == $item->user->id)
                    <form action="/jawaban/{{$item->id}}/" method="POST">
                        <a href="/jawaban/{{$item->id}}/edit" class="btn btn-primary mx-2">Edit</a>
                            @csrf
                            @method('DELETE')
                        <input type="submit" class="btn btn-primary" value="Delete">
                    </form>
                @endif
                @endauth  
            
        </div>
        </div>
    </div>
        
    @empty
    <h4 class="m-4 text-muted">Belum Ada Jawaban</h4>
    @endforelse

    <hr>
    @auth
        <h3 class="m-4">Beri Jawaban</h3>
        <form action="/jawaban" method="POST" enctype="multipart/form-data" class="m-4">
            @csrf
            <input type="hidden" value="{{$pertanyaan->id}}" name="pertanyaan_id" >
            <div class="form-group">
                <textarea type="text" class="form-control" name="jawaban" placeholder="Masukkan jawaban anda" cols="5" rows="5"></textarea>
                @error('jawaban')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Jawaban</button>
        </form>
    @endauth

@endsection