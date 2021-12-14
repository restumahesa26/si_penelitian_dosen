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
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endpush
