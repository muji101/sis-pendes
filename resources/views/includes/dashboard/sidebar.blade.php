<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex">
                <img src="/images/logo.png" alt="" srcset="">
                <p class="text-primary">sispendes</p>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">


                <li class='sidebar-title'>Main Menu</li>

                <li class="sidebar-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>

                </li>

                <li class="sidebar-item  has-sub {{ (request()->is('residents*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="package" width="20"></i>
                        <span>Data Penduduk</span>
                    </a>

                    <ul class="submenu ">

                        <li>
                            <a href="{{ route('residents.index') }}">List  Penduduk</a>
                        </li>
                        <li>
                            <a href="{{ route('residents.create') }}">Tambah Penduduk</a>
                        </li>

                    </ul>

                </li>

                <li class="sidebar-item  has-sub {{ (request()->is('families*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="briefcase" width="20"></i>
                        <span>Data Kartu Keluarga</span>
                    </a>
                    <ul class="submenu ">

                        <li>
                            <a href="{{ route('families.index') }}">List Kartu Keluarga</a>
                        </li>

                        <li>
                            <a href="{{ route('families.create') }}">Tambah Kartu Keluarga</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item  has-sub {{ (request()->is('births*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="droplet" width="20"></i>
                        <span>Data Kelahiran</span>
                    </a>
                    <ul class="submenu ">

                        <li>
                            <a href="{{ route('births.index') }}">List Kelahiran</a>
                        </li>

                        <li>
                            <a href="{{ route('births.create') }}">Tambah Kelahiran</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item  has-sub {{ (request()->is('deaths*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="slack" width="20"></i>
                        <span>Data Kematian</span>
                    </a>
                    <ul class="submenu ">

                        <li>
                            <a href="{{ route('deaths.index') }}">List Kematian</a>
                        </li>

                        <li>
                            <a href="{{ route('deaths.create') }}">Tambah Kematian</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item  has-sub {{ (request()->is('moves*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="wind" width="20"></i>
                        <span>Data Perpindahan</span>
                    </a>
                    <ul class="submenu ">

                        <li>
                            <a href="{{ route('moves.index') }}">List Perpindahan</a>
                        </li>

                        <li>
                            <a href="{{ route('moves.create') }}">Tambah Perpindahan</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item  has-sub {{ (request()->is('comes*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="repeat" width="20"></i>
                        <span>Data Pendatang</span>
                    </a>
                    <ul class="submenu ">

                        <li>
                            <a href="{{ route('comes.index') }}">List Pendatang</a>
                        </li>

                        <li>
                            <a href="{{ route('comes.create') }}">Tambah Pendatang</a>
                        </li>

                    </ul>
                </li>

                <li class='sidebar-title'>Settings &amp; Others</li>

                <li class="sidebar-item  has-sub {{ (request()->is('user*')) ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="users" width="20"></i>
                        <span>Setting Users</span>
                    </a>

                    <ul class="submenu ">

                        <li>
                            <a href="{{ route('user.index') }}">List Users</a>
                        </li>

                        <li>
                            <a href="{{ route('user.create') }}">Create Users</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('villages.index') }}" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Setting Profile Village</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <a class="sidebar-link" href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i data-feather="log-out" width="20"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>