@extends('template')
@section('judul_halaman')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label class="font-weigh-bold">metodepembayaran</label>
<input type="text" class="form-control @error('metodepembayaran') is-invalid @enderror" name="metodepembayaran" value="{{old('metodepembayaran') }}" placeholder="Masukkan nama pembayaran">

<!-- error message untuk title-->
@error('metodepembayaran')
<div class="alert alert-danger mt2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
<label class="font-weight-bold">statuspembayaran</label>
<input type="text" class="form-control @error('statuspembayaran') is-invalid @enderror" name="statuspembayaran" value="{{old('statuspembayaran')}}" placeholder="Masukan statuspembayaran">

@error('statuspembayaran')
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
