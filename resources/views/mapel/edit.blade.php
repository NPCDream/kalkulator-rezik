@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card-border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('mapel.update', $mapel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
<label class="font-weight-bold">NAMA MATA PELAJARAN</label>
<input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" name="nama_mapel" value="{{old('nama_mapel', $mapel->nama_mapel)}}" placeholder="Masukkan Nama Mapel">
@error('nama_mapel')
<div class="alert alert-danger mt-2">
    {{$message}}
</div>
@enderror
</div>
<div class="form-group">
    <label class="font-weigh-bold">NAMA GURU</label>
<input type="text" class="form-control @error('namaguru') is-invalid @enderror" name="namaguru" value="{{old('namaguru', $mapel->namaguru)}}" placeholder="Masukan Nama Guru">
@error('namaguru')
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
