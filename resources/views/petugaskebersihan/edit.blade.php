@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card-border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('petugaskebersihan.update', $petugaskebersihan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<div class="form-group">
<label class="font-weight-bold">namapetugaskebersihan</label>
<input type="text" class="form-control @error('namapetugaskebersihan') is-invalid @enderror" name="namapetugaskebersihan" value="{{old('namapetugaskebersihan', $petugaskebersihan->namapetugaskebersihan)}}" placeholder="Masukkan namapetugaskebersihan">

@error('namapetugaskebersihan')
<div class="alert alert-danger mt-2">
    {{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">alamat</label>
<input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('penerbit', $petugaskebersihan->alamat)}}" placeholder="Masukan alamat">

@error('alamat')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">no</label>
<input type="text" class="form-control @error('no') is-invalid @enderror" name="no" value="{{old('no', $petugaskebersihan->no)}}" placeholder="Masukan no">

@error('no')
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
