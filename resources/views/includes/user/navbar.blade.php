<main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="/"><img src="{{ url('assets/img/logo.png') }}"  alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
                <li class="nav-item px-3 px-xl-1"><a class="nav-link fw-medium @if (Route::is('home'))
                    active
                  @endif" aria-current="page" href="{{ route('home') }}">Beranda</a></li>
              <li class="nav-item px-3 px-xl-1"><a class="nav-link fw-medium @if (Route::is('home-penelitian'))
                active
              @endif" aria-current="page" href="/penelitian-home">Penelitian</a></li>
              <li class="nav-item px-3 px-xl-1"><a class="nav-link fw-medium" aria-current="page" href="https://www.unib.ac.id/">UNIB</a></li>
              <li class="nav-item px-3 px-xl-1"><a class="nav-link fw-medium" aria-current="page" href="https://www.unib.ac.id/fakultas/fakultas-teknik/">Teknik UNIB</a></li>
              @if (Auth::user())
              <li class="nav-item px-3 px-xl-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-outline-dark order-1 order-lg-0 fw-medium" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Logout') }}
                    </a>
                </form>
                </li>
              <li class="nav-item px-3 px-xl-1"><a class="btn btn-outline-dark order-1 order-lg-0 fw-medium" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a></li>
              @else
              <li class="nav-item px-3 px-xl-1"><a class="btn btn-outline-dark order-1 order-lg-0 fw-medium" aria-current="page" href="{{ route('login') }}">Masuk</a></li>
              <li class="nav-item px-3 px-xl-1"><a class="btn btn-outline-dark order-1 order-lg-0 fw-medium" href="{{ route('register') }}">Registrasi</a></li>
              @endif
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section style="padding-top: 7rem;">
        <div class="bg-holder" style="background-image:url(assets/img/hero/hero-bg.svg);">
        </div>
        <!--/.bg-holder-->
