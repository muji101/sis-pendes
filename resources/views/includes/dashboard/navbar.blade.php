<nav class="navbar navbar-header navbar-expand navbar-light">
    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
            <li class="dropdown nav-icon">
                @if(session('welcome'))
                    <div class="alert alert-info pt-1">
                        <b>{{ session('welcome') }}</b>
                    </div>
                @endif
                <a href="#" data-bs-toggle="dropdown"
                    class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                    <div class="d-lg-inline-block">
                        <i data-feather="bell"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                    <h6 class='py-2 px-4'>Notifications</h6>
                    <ul class="list-group rounded-none">
                        <li class="list-group-item border-0 align-items-start">
                            <div class="avatar bg-success me-3">
                                <span class="avatar-content"><i class="fas fa-robot"></i></span>
                            </div>
                            <div>
                                <h6 class='text-bold'>Sistem Message</h6>
                                <p class='text-xs'>
                                    Silahkan Masuk Ke Setting Profile Village Sebelum Membuat Data!
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" data-bs-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar me-1">
                        <img src="/dist/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                    </div>
                    <div class="d-none d-md-block d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                    {{-- <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a> --}}
                    {{-- <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a> --}}
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a> --}}
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i data-feather="log-out" width="20"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>