@extends('layouts.admin')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penelitian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="./">Data Penelitian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('penelitian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="anggota_1">Nama Anggota 1</label>
                    <input type="text" name="anggota_1" id="anggota_1" class="form-control @error('anggota_1') is-invalid @enderror" placeholder="Nama Anggota 1" value="{{ old('anggota_1') }}">
                    @error('anggota_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="anggota_2">Nama Anggota 2</label>
                    <input type="text" name="anggota_2" id="anggota_2" class="form-control @error('anggota_2')  is-invalid  @enderror" placeholder="Nama Anggota 2" value="{{ old('anggota_2') }}">
                    @error('anggota_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_program">Jenis Program</label>
                    <input type="text" name="jenis_program" id="jenis_program" class="form-control @error ('jenis_program') is-invalid @enderror" placeholder="Jenis Program" value="{{ old('jenis_program') }}">
                    @error('jenis_program')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul_program">Judul Program</label>
                    <input type="text" name="judul_program" id="judul_program" class="form-control @error('judul_program') is-invalid @enderror" placeholder="Judul Program" value="{{ old('judul_program') }}">
                    @error('judul_program')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_file">Pilih File</label>
                    <input type="file" name="nama_file" id="nama_file" class="form-control @error('nama_file') is-invalid @enderror">
                    @error('nama_file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_jurnal">Link Jurnal</label>
                    <input type="text" name="link_jurnal" id="link_jurnal" class="form-control @error('link_jurnal') is-invalid @enderror" placeholder="Link Jurnal" value="{{ old('link_jurnal') }}">
                    @error('link_jurnal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul_jurnal">Judul Jurnal</label>
                    <input type="text" name="judul_jurnal" id="judul_jurnal" class="form-control @error('judul_jurnal') is-invalid @enderror" placeholder="Judul Jurnal" value="{{ old('judul_jurnal') }}">
                    @error('judul_jurnal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_luaran_1">Link Tambahan</label>
                    <input type="text" name="link_luaran_1" id="link_luaran_1" class="form-control @error('link_luaran_1') is-invalid @enderror" placeholder="Link Tambahan" value="{{ old('link_luaran_1') }}">
                    @error('link_luaran_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_luaran_2">Link Tambahan 2</label>
                    <input type="text" name="link_luaran_2" id="link_luaran_2" class="form-control @error('link_luaran_2') is-invalid @enderror" placeholder="Link Tambahan" value="{{ old('link_luaran_2') }}">
                    @error('link_luaran_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
