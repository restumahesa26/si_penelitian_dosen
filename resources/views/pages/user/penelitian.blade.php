@extends('layouts.user')

@section('content')
<section class="pt-5 pt-md-9" id="service">

    <div class="container">
        <div class="position-absolute z-index--1 end-0 d-none d-lg-block"><img src="{{ url('assets/img/category/shape.svg') }}"
                style="max-width: 200px" alt="service" /></div>
        <div class="mb-7 text-center">
            <h5 class="text-secondary">FAKULTAS TEKNIK</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">DATA PENELITIAN DOSEN</h3>
        </div>
        @if ($message = Session::get('error'))
            <script>
                alert('{{ $message }}')
            </script>
        @endif
        <div class="row">
            <form action="{{ route('home-penelitian.search') }}" method="GET">
            <div class="d-flex justify-content-center align-items-center">
                <input type="search" name="search" id="search" class="form-control mb-3 mx-3" placeholder="Masukkan kata kunci judul program, jenis program">
                <button type="submit" class="btn btn-primary mb-3 mx-3">Cari</button>
            </div>
        </form>
            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap" id="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>File</td>
                            <td>Jenis Program</td>
                            <td>Judul Program</td>
                            <td>Link Jurnal</td>
                            <td>Link Luaran 1</td>
                            <td>Link Luaran 2</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penelitians as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ asset('storage/file-program/' . $item->nama_file) }}" class="btn btn-primary">Lihat File</a>
                            </td>
                            <td>{{ $item->jenis_program }}</td>
                            <td>{{ $item->judul_program }}</td>
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
            <div class="d-flex justify-content-center mt-3">
                {!! $penelitians->links("pagination::bootstrap-4") !!}
            </div>
        </div>
    </div>
    <!-- end of .container-->
    @endsection
