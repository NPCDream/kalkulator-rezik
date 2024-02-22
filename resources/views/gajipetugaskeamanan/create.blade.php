@extends('template')
@section('judul_halaman')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('gajipetugaskeamanan.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label class="font-weigh-bold">namapetugaskeamanan</label>
<input type="text" class="form-control @error('namapetugaskeamanan') is-invalid @enderror" name="namapetugaskeamanan" value="{{old('namapetugaskeamanan') }}" placeholder="Masukkan nama gajipetugaskeamanan">

<!-- error message untuk title-->
@error('namapetugaskeamanan')
<div class="alert alert-danger mt2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
<label class="font-weight-bold">gaji</label>
<input type="text" class="form-control @error('gaji') is-invalid @enderror" name="gaji" value="{{old('gaji')}}" placeholder="Masukan gaji">

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
