@extends('layouts.master')

@section('title')
    Menampilkan data game
@endsection

@section('content')
<a href="/game/create" class="btn btn-primary btn-sm">Tambah Data</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Game</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($game as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->name}}</td>
            <td>
                
                <form action="/game/{{$value->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/game/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/game/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
            
        </tr>
    @empty
        <tr>
            <td>Tidak Ada Data</td>
        </tr>
    @endforelse
    </tbody>
  </table>
@endsection

@push('scripts')
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "Memasangkan script sweet alert",
        icon: "success",
        confirmButtonText: "Cool",
    });
</script>

@endpush