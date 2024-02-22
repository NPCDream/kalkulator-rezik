@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card-border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('laundrie.update', $laundrie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<div class="form-group">
<label class="font-weight-bold">BERAT PAKAIAN</label>
<input type="text" class="form-control @error('beratpakaian') is-invalid @enderror" name="beratpakaian" value="{{old('beratpakaian', $laundrie->beratpakaian)}}" placeholder="Masukkan beratpakaian">

@error('beratpakaian')
<div class="alert alert-danger mt-2">
    {{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">HARGA PERKILO</label>
<input type="text" class="form-control @error('hargaperkilo') is-invalid @enderror" name="hargaperkilo" value="{{old('penerbit', $laundrie->hargaperkilo)}}" placeholder="Masukan hargaperkilo">

@error('hargaperkilo')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">ALAMAT</label>
<input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat', $laundrie->alamat)}}" placeholder="Masukan alamat">

@error('alamat')
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
