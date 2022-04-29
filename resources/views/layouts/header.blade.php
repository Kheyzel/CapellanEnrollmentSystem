<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>

<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#">
    <img src="{{asset('../img/capellan-logo.png')}}" width="50px" height="45px" alt="Brand Logo">
</a> 

<div class="d-none .d-lg-block d-xl-block">
<a class="c-header-brand c-header-brand-sm-up-center" href="{{route('dashboard')}}">
    <h3 class = "text-warning font-weight-bold px-5 py-1 rounded-top rounded-bottom" style="background-color: rgb(8, 42, 145);">CAPELLAN INSTITUTE OF TECHNOLOGY</h3>
</a> 
</div>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>

<ul class="c-header-nav mfs-auto">
</ul>
<ul class="c-header-nav">
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar mr-1">
                <img class="c-avatar-img" src="{{asset('../img/capellan-profile2.png')}}" alt="Avatar">
            </div>
            <div class = "mr-5">
                <strong>{{Auth::user()->name}}</strong>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
            {{-- <a class="dropdown-item" href="#">
                <i class="c-icon mfe-2 cil-user"></i>Profile
            </a> --}}
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="c-icon mfe-2 cil-account-logout"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</ul>

<div class="c-subheader justify-content-between px-3">
    @yield('breadcrumb')
</div>
