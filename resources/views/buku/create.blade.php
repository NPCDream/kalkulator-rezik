@extends('template')
@section('judul_halaman')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label class="font-weigh-bold">JUDUL</label>
<input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul') }}" placeholder="Masukkan Judul">

<!-- error message untuk title-->
@error('judul')
<div class="alert alert-danger mt2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
<label class="font-weight-bold">PENERBIT</label>
<input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{old('penerbit')}}" placeholder="Masukan Penerbit">

@error('penerbit')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
<label class="font-weigh-bold">JUMLAH</label>
<input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{old('jumlah') }}" placeholder="Masukkan jumlah">

<!-- error message untuk title-->
@error('jumlah')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-warning">RESET</button>

</form>
</div>
</div>
</div>
</div>
</div>

@endsection
