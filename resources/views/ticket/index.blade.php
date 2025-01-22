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
    <div class="par-text">Data ticket {{ $status }}</div>
    <div class="par-tex2">
</h2><br>
@if ($status == 'masuk')
  <a href="{{ route('ticket.create') }}"
  class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
@endif
<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">SOPD</th>
      <th style="vertical-align: middle; text-align: center">Aduan</th>
      <th style="vertical-align: middle; text-align: center">Tanggal Masuk</th>
      <th style="vertical-align: middle; text-align: center">Tanggal Selesai</th>
      <th style="vertical-align: middle; text-align: center">Keterangan</th>
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
     </tr>
  </thead>
  <tbody>
    @foreach ($tickets as $item)
    <tr>
        <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
        <td style="text-align: center;width:20%">{{ $item->sopd->nama_sopd }}</td>
        <td style="text-align: center;">{{ $item->aduan }}</td>
        <td style="text-align: center;">{{ $item->tanggalMasuk }}</td>
        <td style="text-align: center;">{{ $item->tanggalSelesai }}</td>
        <td style="text-align: center;">{{ $item->keterangan }}</td>
        <td style="text-align: center">
            <a href="{{ route('ticket.edit', ['ticket' => $item]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>
            <form action="{{ route('ticket.destroy', ['ticket' => $item, 'status' => $status]) }}" method="post">
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
