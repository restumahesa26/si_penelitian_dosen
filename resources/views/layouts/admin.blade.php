<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Penelitian Dosen - Dashboard</title>

    @include('includes.style')

    <style>
        input::placeholder {
            opacity: .5 !important;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">

        @include('includes.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('includes.navbar')

                @yield('content')

                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabelLogout">Warning</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah kamu yakin ingin keluar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary"
                                    data-dismiss="modal">Tidak</button>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Keluar
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @include('includes.footer')

        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('includes.script')

</body>

@stack('addon-script')

</html>
