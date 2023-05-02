@extends('empty')

@section('body')
    <nav class="navbar navbar-expand-lg navbar-dark" id="topnav">
        <div class="container">

            <!-- Toggler -->
            <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- User -->
            <div class="navbar-user">

                <!-- Dropdown -->
                <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm dropdown-toggle" role="button" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <img src="/avatar.jpg" alt="" class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" data-bs-popper="static">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button href="./sign-in.html" class="dropdown-item">Se déconnecter</button>
                        </form>
                    </div>

                </div>

            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

                <!-- Navigation -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('movements.index') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('movements.index') }}">
                            Mouvements
                        </a>
                    </li>
                </ul>

            </div>

        </div> <!-- / .container -->
    </nav>

    <x-flash/>

    <div class="main-content">
        @yield('content')
    </div>
@endsection
