@extends('template')
@section('judul_halaman','')
@section('konten')

<h2>Daftar Nama Mata Pelajaran</h2>
<body style="background: lightgray">
<div class="container mt-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<a href="{{ route('mapel.create') }}" class="btn btn-md btn-success mb-3">ADD BLOG</a>
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">Nama Mata pelajaran</th>
<th scope="col">nama guru</th>
<th scope="col"></th>
<th scope="col">AKSI</th>
</tr>
</thead>
<tbody>
@forelse ($mapels as $mapel)
<tr>
<td class="text-center">
{{ $mapel->nama_mapel }}
</td>
<td>{{ $mapel->namaguru }}</td>
<td></td>
<td class="text-center">
<form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('mapel.destroy', $mapel->id) }}" method="POST">
<a href="{{ route('mapel.edit', $mapel->id) }}"
class="btn btn-sm btn-primary">EDIT</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
</form>
</td>
</tr>
@empty
<div class="alert alert-danger">
Data Blog belum Tersedia.
</div>
@endforelse
</tbody>
</table>
{{ $mapels->links() }}
</div>
</div>
</div>
</div>
</div>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
</script>
<script
src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
//message with toastr
@if(session()-> has('success'))
toastr.success('{{ session('success') }}', 'BERHASIL!');
@elseif(session()-> has('error'))
toastr.error('{{ session('error') }}', 'GAGAL!');
@endif
</script>
@endsection