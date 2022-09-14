<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="" class="brand-link">
        <img src="img/dorsu.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Alumni Tracer</span>
    </a>

    <!-- Sidebar -->
    <!-- Sidebar user (optional) -->
    <div class="sidebar">
        <div class="user-panel mt-3 mb-3 d-flex">
            @if($student)
            @foreach($user as $us)
                <div class="image">
                    <img src="@if($us->profile == '') img/businessperson.png @else {{$us->profile}} @endif" class="img-circle elevation-2 spi" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="fontweight d-block">{{auth()->user()->name}}</a>
                    <a href="#" id="userid">{{$us->id}}</a>
                </div>
            @endforeach
            @endif
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach($submenu as $menu)
                    <li class="nav-item has-treeview">
                        <a href="{{$menu->link}}" class="@if($active == $menu->name) active @endif nav-link"><i class="nav-icon {{$menu->icon}}"></i>
                            <p>{{$menu->name}}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>