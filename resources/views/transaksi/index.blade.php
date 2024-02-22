@extends('template')
@section('judul_halaman','')
@section('konten')

<h2>Daftar transaksi</h2>
<body style="background: lightgray">
<div class="container mt-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<a href="{{ route('transaksi.create') }}" class="btn btn-md btn-danger mb-3">ADD BLOG</a>
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">idtransaksi</th>
<th scope="col">namapembeli</th>
<th scope="col">tanggal</th>
<th scope="col">pembayaran</th>

<th scope="col">ACTION</th>
</tr>
</thead>
<tbody>
@forelse ($transaksis as $transaksi)
<tr>
<td class="text-center">
{{ $transaksi->idtransaksi }}
</td>
<td>{{ $transaksi->namapembeli }}</td>
<td>{{ $transaksi->tanggal}}</td>
<td>{{ $transaksi->pembayaran}}</td>
<td class="text-center">
<form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
<a href="{{ route('transaksi.edit', $transaksi->id) }}"
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
toastr.success('{{ session('success') }}','BERHASIL!');
@elseif(session()-> has('error'))
toastr.error('{{ session('error') }}', 'GAGAL!');
@endif
</script>
@endsection
