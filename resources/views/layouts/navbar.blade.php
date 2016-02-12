<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Truck</b>Jee</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img style="max-width: 100%;max-height: 100%;"  src="{{ url('images/logo.png') }}" alt="TruckJee"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="messages-menu">
                    <a href="{{ url('/logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar">
    @if(auth()->user()->role == 0)
        @include('layouts.admin-navbar')
    @elseif(auth()->user()->role == 1)
        @include('layouts.truckowner-navbar')
    @else
        @include('layouts.transporter-navbar')
    @endif
</aside>