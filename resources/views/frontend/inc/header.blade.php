<div class="wrapper ">
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-custom navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end">
                    @guest
                        <a class="nav-link" href="{{ Route('login') }}">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                    @elseif (Auth::user()->user_type == 1)
                        <a class="nav-link" href="" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><img src="{{ asset(Auth::user()->image) }}"></a>
                        <div class="dropdown-menu dropdown-menu-right" style=" margin-right: 60px; margin-top: -13px ;"
                            aria-labelledby="navbarDropdownMenuLink2">
                            <a class="dropdown-item"
                                href="{{ Route('admin.profile', ['id' => Auth::user()->id]) }}">Account</a>
                            <a class="dropdown-item" href="{{ Route('admin.dashboard') }}">Control
                                Page</a>
                            <a class="dropdown-item" href="{{ ROute('logout') }}">Logout</a>
                        </div>
                    @else
                        <a class="nav-link" href="" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset(Auth::user()->image) }}">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style=" margin-right: 60px; margin-top: -13px ;"
                            aria-labelledby="navbarDropdownMenuLink2">
                            <a class="dropdown-item"
                                href="{{ Route('profile', ['id' => Auth::user()->id]) }}">Account</a>
                            <a class="dropdown-item" href="{{ Route('logout') }}">Logout</a>
                        </div>
                        @endif
                    </div>
                </div>
            </nav>
