@extends('template')
@section('judul_halaman')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('laundrie.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label class="font-weigh-bold">BERAT PAKAIAN</label>
<input type="text" class="form-control @error('beratpakaian') is-invalid @enderror" name="beratpakaian" value="{{old('beratpakaian') }}" placeholder="Masukkan Berat Pakaian">

<!-- error message untuk title-->
@error('beratpakaian')
<div class="alert alert-danger mt2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
<label class="font-weight-bold">HARGA PERKILO</label>
<input type="text" class="form-control @error('hargaperkilo') is-invalid @enderror" name="hargaperkilo" value="{{old('hargaperkilo')}}" placeholder="Masukan Harga Perkilo">

@error('hargaperkilo')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
<label class="font-weigh-bold">alamat</label>
<input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat') }}" placeholder="Masukkan alamat">

<!-- error message untuk title-->
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
