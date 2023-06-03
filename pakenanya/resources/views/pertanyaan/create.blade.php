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
    Tambah Pertanyaan
@endsection

@section('content')

     <form action="/pertanyaan" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <textarea class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Masukkan Pertanyaan"></textarea>
                    @error('pertanyaan')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            
            
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" id="" placeholder="Silakan pilih salah satu gambar">
                </div>
                    @error('gambar')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    
            
            
            
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select name="kategori_id" class="form-control" id="">
            <option value="">--Pilih Kategori--</option>
            @forelse ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @empty
                <option value="">--Tidak ada Kategori--</option>
            @endforelse
        </select>
    </div>
    
    {{-- <div class="form group">
        <label>Gambar</label>
        <textarea></textarea>
    </div> --}}

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/pertanyaan" class="btn btn-light"> Kembali </a>

</form>
          </div>
        </div>
    </div>
    
@endsection