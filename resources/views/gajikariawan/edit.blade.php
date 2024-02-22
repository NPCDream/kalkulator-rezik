@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card-border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('gajikariawan.update', $gajikariawan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<div class="form-group">
<label class="font-weight-bold">namakariawan</label>
<input type="text" class="form-control @error('namakariawan') is-invalid @enderror" name="namakariawan" value="{{old('namakariawan', $gajikariawan->namakariawan)}}" placeholder="Masukkan namakariawan">

@error('namakariawan')
<div class="alert alert-danger mt-2">
    {{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">gaji</label>
<input type="text" class="form-control @error('gaji') is-invalid @enderror" name="gaji" value="{{old('gaji', $gajikariawan->gaji)}}" placeholder="Masukan gaji">

@error('gaji')
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
