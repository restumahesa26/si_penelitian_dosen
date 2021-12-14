@extends('layouts.user')

@section('content')
<section class="pt-5 pt-md-9" id="service">

    <div class="container">
        <div class="position-absolute z-index--1 end-0 d-none d-lg-block"><img src="assets/img/category/shape.svg"
                style="max-width: 200px" alt="service" /></div>
        <div class="mb-7 text-center">
            <h5 class="text-secondary">CATEGORY </h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">We Offer Best Services</h3>
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
