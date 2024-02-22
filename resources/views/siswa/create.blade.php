@extends('template')
@section('judul_halaman')
@section('konten')

<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label class="font-weigh-bold">Nis30</label>
<input type="text" class="form-control @error('nis30') is-invalid @enderror" name="nis30" value="{{old('nis30') }}" placeholder="Masukkan nis30">

<!-- error message untuk title-->
@error('nis30')
<div class="alert alert-danger mt2">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
    <label class="font-weigh-bold">Nama30</label>
    <input type="text" class="form-control @error('nama30') is-invalid @enderror" name="nama30" value="{{old('nama30') }}" placeholder="Masukkan nama30">

    <!-- error message untuk title-->
    @error('nama30')
    <div class="alert alert-danger mt2">
    {{$message}}
    </div>
    @enderror
    </div>

<div class="form-group">
<label class="font-weight-bold">Jenis_Kelamin30</label>
<input type="text" class="form-control @error('jenis_kelamin30') is-invalid @enderror" name="jenis_kelamin30" value="{{old('jenis_kelamin30')}}" placeholder="Masukan jenis_kelamin30">

@error('jenis_kelamin30')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>

<div class="form-group">
<label class="font-weigh-bold">Kelas30</label>
<input type="text" class="form-control @error('kelas30') is-invalid @enderror" name="kelas30" value="{{old('kelas30') }}" placeholder="Masukkan kelas30">

<!-- error message untuk title-->
@error('kelas30')
<div class="alert alert-danger mt-2">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
    <label class="font-weigh-bold">Jurusan30</label>
    <input type="text" class="form-control @error('jurusan30') is-invalid @enderror" name="jurusan30" value="{{old('jurusan30') }}" placeholder="Masukkan jurusan30">

    <!-- error message untuk title-->
    @error('jurusan30')
    <div class="alert alert-danger mt-2">
    {{$message}}
    </div>
    @enderror
    </div>
    <div class="form-group">
        <label class="font-weigh-bold">Alamat30</label>
        <input type="text" class="form-control @error('alamat30') is-invalid @enderror" name="alamat30" value="{{old('alamat30') }}" placeholder="Masukkan alamat30">

        <!-- error message untuk title-->
        @error('alamat30')
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
