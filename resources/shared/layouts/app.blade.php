@extends('shared.layouts.master')
@section('body-class','hold-transition sidebar-mini layout-fixed layout-navbar-fixed')

@section('content')
    {{-- Navbar --}}
        @include('shared.views.header.header')
    {{-- End-Navbar --}}

    {{-- Main-Sidebar --}}
        @include('shared.views.sidebar.sidebar-main')
    {{-- End-Main-Sidebar --}}
    
    {{-- Content-Wrapper-Page --}}
        <div class="content-wrapper"  v-cloak>
            {{-- <div class="sidemenu-control" style="position: absolute;
            top: 44px;
            background: #343a40;
            z-index: 48;
            font-size: 8px;">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>            
            </div> --}}
            {{-- <div> --}}
                @yield('app-content')
            {{-- </div> --}}
        </div>
    {{-- End-Content-Wrapper-Page --}}

    {{-- Right-Sidebar --}}
        <aside class="control-sidebar control-sidebar-light position-fixed" >
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
            <div class="control-sidebar-content">
                
            </div>
        </aside>
    {{-- End-Right-Sidebar --}}

    {{-- Footer --}}
        @include('shared.views.footer.footer')
    {{-- End-Footer --}}
@endsection