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
        <div class="content-wrapper">
            <div v-cloak>
                @yield('app-content')
            </div>
        </div>
    {{-- End-Content-Wrapper-Page --}}

    {{-- Right-Sidebar --}}
        <aside class="control-sidebar control-sidebar-light" >
            <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
            </div>
        </aside>
    {{-- End-Right-Sidebar --}}

    {{-- Footer --}}
        @include('shared.views.footer.footer')
    {{-- End-Footer --}}
@endsection