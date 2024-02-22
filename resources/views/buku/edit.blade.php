@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card-border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<div class="form-group">
<label class="font-weight-bold">JUDUL</label>
<input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul', $buku->judul)}}" placeholder="Masukkan judul">

@error('judul')
<div class="alert alert-danger mt-2">
    {{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">PENERBIT</label>
<input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{old('penerbit', $buku->penerbit)}}" placeholder="Masukan penerbit">

@error('penerbit')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">JUMLAH</label>
<input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{old('jumlah', $buku->jumlah)}}" placeholder="Masukan jumlah">

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
