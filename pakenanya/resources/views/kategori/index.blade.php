@extends('layouts.master')

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(function () {
            $("#kategori").DataTable();
        });
    </script>
@endpush

@push('headers')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
@endpush


@section('content')
    
<div class="row">
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Halaman Data Kategori</h4>
        <a href="/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered table-striped" id="kategori">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $key=>$value)
                    <tr>
                        <td>{{$key + 1}}</th>
                        <td>{{$value->nama}}</td>
                        <td>
                            <form action="/kategori/{{$value->id}}" method="POST">
                            <a href="/kategori/{{$value->id}}" class="btn btn-info py-2 btn-sm">Show</a>
                              <a href="/kategori/{{$value->id}}/edit" class="btn btn-primary py-2 btn-sm">Edit</a>
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger py-2 btn-sm" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr colspan="3">
                        <td>No data</td>
                    </tr>  
                @endforelse              
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection