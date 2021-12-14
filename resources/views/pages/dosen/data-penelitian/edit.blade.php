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
            <form action="{{ route('penelitian.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="anggota_1">Nama Anggota 1</label>
                    <input type="text" name="anggota_1" id="anggota_1" class="form-control @error('anggota_1') is-invalid @enderror" placeholder="Nama Anggota 1" value="{{ $item->anggota_1 }}">
                </div>
                <div class="form-group">
                    <label for="anggota_2">Nama Anggota 2</label>
                    <input type="text" name="anggota_2" id="anggota_2" class="form-control @error('anggotA_2')  is-invalid  @enderror" placeholder="Nama Anggota 2" value="{{ $item->anggota_2 }}">
                </div>
                <div class="form-group">
                    <label for="jenis_program">Jenis Program</label>
                    <input type="text" name="jenis_program" id="jenis_program" class="form-control @error ('jenis_program') is-invalid @enderror" placeholder="Jenis Program" value="{{ $item->jenis_program }}">
                </div>
                <div class="form-group">
                    <label for="judul_program">Judul Program</label>
                    <input type="text" name="judul_program" id="judul_program" class="form-control @error('judul_program') is-invalid @enderror" placeholder="Judul Program" value="{{ $item->judul_program }}">
                </div>
                <div class="form-group">
                    <label for="nama_file">Pilih File</label>
                    <input type="file" name="nama_file" id="nama_file" class="form-control @error('nama_file') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="link_jurnal">Link Jurnal</label>
                    <input type="text" name="link_jurnal" id="link_jurnal" class="form-control @error('link_jurnal') is-invalid @enderror" placeholder="Link Jurnal" value="{{ $item->link_jurnal }}">
                </div>
                <div class="form-group">
                    <label for="judul_jurnal">Judul Jurnal</label>
                    <input type="text" name="judul_jurnal" id="judul_jurnal" class="form-control @error('judul_jurnal') is-invalid @enderror" placeholder="Judul Jurnal" value="{{ $item->judul_jurnal }}">
                </div>
                <div class="form-group">
                    <label for="link_luaran_1">Link Tambahan</label>
                    <input type="text" name="link_luaran_1" id="link_luaran_1" class="form-control @error('linK_luaran_1') is-invalid @enderror" placeholder="Link Tambahan" value="{{ $item->link_luaran_1 }}">
                </div>
                <div class="form-group">
                    <label for="link_luaran_2">Link Tambahan 2</label>
                    <input type="text" name="link_luaran_2" id="link_luaran_2" class="form-control @error('link_luaran_2') is-invalid @enderror" placeholder="Link Tambahan" value="{{ $item->link_luaran_2 }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
