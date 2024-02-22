@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card-border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<div class="form-group">
<label class="font-weight-bold">idtransaksi</label>
<input type="text" class="form-control @error('idtransaksi') is-invalid @enderror" name="idtransaksi" value="{{old('idtransaksi', $transaksi->idtransaksi)}}" placeholder="Masukkan idtransaksi">

@error('idtransaksi')
<div class="alert alert-danger mt-2">
    {{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">namapembeli</label>
<input type="text" class="form-control @error('namapembeli') is-invalid @enderror" name="namapembeli" value="{{old('namapembeli', $transaksi->namapembeli)}}" placeholder="Masukan namapembeli">

@error('namapembeli')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
    <label class="font-weigh-bold">tanggal</label>
<input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{old('tanggal', $transaksi->tanggal)}}" placeholder="Masukan tanggal">

@error('tanggal')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
    <label class="font-weigh-bold">pembayaran</label>
<input type="text" class="form-control @error('pembayaran') is-invalid @enderror" name="pembayaran" value="{{old('pembayaran', $transaksi->pembayaran)}}" placeholder="Masukan pembayaran">

@error('tanggal')
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
