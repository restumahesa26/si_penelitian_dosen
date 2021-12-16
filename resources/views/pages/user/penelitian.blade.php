@extends('layouts.user')

@section('content')
<section class="pt-5 pt-md-9" id="service">

    <div class="container">
        <div class="position-absolute z-index--1 end-0 d-none d-lg-block"><img src="assets/img/category/shape.svg"
                style="max-width: 200px" alt="service" /></div>
        <div class="mb-7 text-center">
            <h5 class="text-secondary">FAKULTAS TEKNIK</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">DATA PENELITIAN DOSEN</h3>
        </div>
        <div class="row">
            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap" id="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Jenis Program</td>
                            <td>Judul Program</td>
                            <td>File</td>
                            <td>Link Jurnal</td>
                            <td>Link Luaran 1</td>
                            <td>Link Luaran 2</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penelitians as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->jenis_program }}</td>
                            <td>{{ $item->judul_program }}</td>
                            <td>
                                <a href="{{ asset('storage/file-program/' . $item->nama_file) }}" class="btn btn-primary">Lihat File</a>
                            </td>
                            @if ($item->link_jurnal)
                            <td>
                                <a href="{{ $item->link_jurnal }}" class="btn btn-primary">Link Jurnal</a>
                            </td>
                            @else
                                <td>-</td>
                            @endif
                            @if ($item->link_luaran_1)
                            <td>
                                <a href="{{ $item->link_luaran_1 }}" class="btn btn-primary">Link Luaran 1</a>
                            </td>
                            @else
                                <td>-</td>
                            @endif
                            @if ($item->link_luaran_2)
                            <td>
                                <a href="{{ $item->link_luaran_2 }}" class="btn btn-primary">Link Luaran 2</a>
                            </td>
                            @else
                                <td>-</td>
                            @endif
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of .container-->

    @endsection

    @push('addon-script')
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>
    @endpush
