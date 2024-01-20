<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PT.Oxygen') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'PT.Oxygen Commerce') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif --}}

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (Route::current()->uri() != 'login' && Route::current()->uri() != 'register')
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
              <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="{{ route('home') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::routeIs('home') ? 'active' : '' }}"
                    aria-current="true"
                  >
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Beranda</span>
                  </a>
                  @if(Auth::user()->role != 'ADMINPENJUALAN')
                  <a
                  href="{{ route('databarang') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::routeIs('databarang') ? 'active' : '' }}"
                    aria-current="true"
                  >
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Data Barang</span>
                  </a>
                  @endif
                  @if(Auth::user()->role == 'SUPERADMIN')
                  <a href="{{ route('databagiangudang') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::routeIs('databagiangudang') ? 'active' : '' }}">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Data Bagian Gudang</span>
                  </a>
                  <a href="{{ route('databagianpenjualan') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::routeIs('databagianpenjualan') ? 'active' : '' }}"
                    ><i class="fas fa-lock fa-fw me-3"></i><span>Data Bagian Penjualan</span></a
                  >
                  <a href="{{ route('datasupplier') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::routeIs('datasupplier') ? 'active' : '' }}"
                    ><i class="fas fa-chart-line fa-fw me-3"></i><span>Data Supplier</span></a
                  >
                  @endif
                  @if(Auth::user()->role != 'ADMINPENJUALAN')
                  <a href="{{ route('databarangmasuk') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::routeIs('databarangmasuk') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie fa-fw me-3"></i><span>Data Barang Masuk</span>
                  </a>
                  @endif
                  <a href="{{ route('databarangkeluar') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::routeIs('databarangkeluar') ? 'active' : '' }}"
                    ><i class="fas fa-chart-bar fa-fw me-3"></i><span>Data Barang Keluar</span></a
                  >
                  {{-- <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                    ><i class="fas fa-users fa-fw me-3"></i><span>Data User</span></a
                  > --}}
                </div>
              </div>
            </nav>
            <!-- Sidebar -->
          </header>
          @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
