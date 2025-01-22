@extends('layouts.template')

@section('content')
<script>
  $(document).ready(function(){
    $('#tabel').DataTable( {
        scrollX: true,
        scrollY: true,
       "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        }
    } );
  });
</script>
@if (session()->has('success'))
	<div class="alert alert-success" role="alert">
		{{ session('success') }}
	</div>
@endif
<h2>
    <div class="par-text">Data User</div>
    <div class="par-tex2">
</h2><br>
<a href="{{ route('user.create') }}"
      class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">Nama</th>
      <th style="vertical-align: middle; text-align: center">Username</th>
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
     </tr>
  </thead>
  <tbody>
    @foreach ($users as $item)
    <tr>
        <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
        <td style="text-align: center;width:20%">{{ $item->name }}</td>
        <td style="text-align: center;">{{ $item->username }}</td>
        <td style="text-align: center">
            <a href="{{ route('user.edit', ['user' => $item]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>
            <form action="{{ route('user.destroy', ['user' => $item]) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus data?')"><i class="icon-trash"></i></button>
            </form>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
