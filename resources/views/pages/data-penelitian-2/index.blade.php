@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penelitian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penelitian</li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            @if (Auth::user()->role === 'ADMIN')
                <a href="{{ route('penelitian.create') }}" class="btn btn-primary mb-3">Tambah Data Penelitian</a>
                <a href="{{ route('penelitian.index') }}" class="btn btn-primary mb-3">Lihat Data Penelitian Pengurus</a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Anggota 1</th>
                            <th>Anggota 2</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->anggota_1 }}</td>
                            <td>{{ $item->anggota_2 }}</td>
                            <td>{{ $item->status }}</td>
                            <td><a href="{{ asset('storage/file-program/' . $item->nama_file) }}" class="btn btn-primary btn-sm" target="_blank">File</a></td>
                            <td>
                                @if ($item->status === 'Submit')
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdrop2{{ $item->id }}">
                                    Terima
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop3{{ $item->id }}">
                                    Tolak
                                </button>
                                @endif
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}">
                                    Lihat
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

@foreach ($items as $item2)
<div class="modal fade" id="staticBackdrop{{ $item2->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item2->judul_program }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ $item2->link_jurnal }}" target="_blank">Link Jurnal</a><br>
                <a href="{{ $item2->link_luaran_1}}" target ="_blank">Link Luaran 1</a><br>
                @if ($item2->link_luaran_2 !== NULL)
                    <a href="{{ $item2->link_luaran_2}}" target ="_blank">Link Luaran 2</a>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Ya</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($items as $item3)
<div class="modal fade" id="staticBackdrop2{{ $item3->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item3->judul_program }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penelitian.verifikasi', $item3->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    Yakin ingin memverifikasi penelitian ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($items as $item4)
<div class="modal fade" id="staticBackdrop3{{ $item4->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item4->judul_program }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penelitian.batalkan', $item4->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    Yakin ingin membatalkan penelitian ini?
                    <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="5" placeholder="Masukkan Pesan" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush
