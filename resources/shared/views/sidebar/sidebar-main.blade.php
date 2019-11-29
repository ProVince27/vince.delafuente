
<aside class="main-sidebar sidebar-dark-navy elevation-0">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{config('project.images.default')}}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-0"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="search-panel mt-1 d-flex">
            <input class="form-control form-control-sm" type="text" placeholder="Search in sidebar">
        </div>
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <div class="text-xs">
                {!! $sidebar !!}
            </div>
            <div class="text-xs position-absolute" style="bottom:10px">
                <div class="text-xs">
                    
                </div>
            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>