@extends('layouts.master')

@push('scripts')
<script src="{{asset ('/tinymce/js\tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    p {margin: 0; padding: 0;}
    forced_root_block : false,
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
    Halaman edit pertanyaan
@endsection

@section('content')
    
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="pertanyaan">Pertanyaan</label>
                <textarea class="form-control" name="pertanyaan" value="{{old('pertanyaan', $pertanyaan->pertanyaan)}}" 
                    id="pertanyaan" placeholder="Masukkan Pertanyaan"></textarea>
                @error('pertanyaan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>    
        <div class="form-group">
            <label for="pertanyaan">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="">
            @error('gambar')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pertanyaan">Kategori</label>
            <select class="form-control" name="kategori_id" value="{{old('kategori_id', $pertanyaan->kategori_id)}}" id="" placeholder="Masukkan Kategori Pertanyaan">
            <option value="">--Pilih Salah satu Kategoti--</option>
            @forelse ($kategori as $item)
                @if ($item->id === $pertanyaan->kategori_id)
                <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                
                @else 
                <option value="{{$item->id}}">{{$item->nama}}</option> 
                @endif
                   
            @empty
                <option value="">Tidak ada Kategori</option>
            @endforelse
        @error('kategori_id')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/pertanyaan" class="btn btn-light"> Kembali </a>
    </form>
</div>
    </div>
</div>
@endsection
