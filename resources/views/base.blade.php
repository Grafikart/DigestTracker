<!doctype html>
<html lang="en">
<head>
    @yield('title')
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" id="topnav">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- User -->
        <div class="navbar-user">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="#" class="avatar avatar-sm dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="" alt="" class="avatar-img rounded-circle">
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="" class="dropdown-item">
                        <span class="fe fe-refresh-ccw"></span>
                        Mouvements
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fe fe-log-out"></i>
                        Se déconnecter
                    </a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#">
                        Établissements
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="" href="#">
                        Publications
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

</body>
</html>
