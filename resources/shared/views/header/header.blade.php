@php
$user = Auth::user();
$role = $user->role()->name;
@endphp
<header class="main-header" v-cloak>
    {{-- <a href="{{ route('dashboard.index') }}" class="logo"> --}}
    <a href="#" class="logo">
        <img src="{{ url('images/header-logo.png') }}" class="logo" :defer="true" />
    </a>

    {{-- <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <fa-icon
            icon = "bars"
            class = "text-primary"
            style = "font-size: 20px;"
         />
        </a>
        <div class="navbar-custom-menu p-r-15">
            <ul class="nav navbar-nav">

                <!-- notifications -->
                <notification-list-header>
                </notification-list-header>

                <!-- orders -->
                @if ($role === 'approver' || $role === 'employee')
                <order-request-list-header>
                </order-request-list-header>
                @endif

                <!-- cart -->
                @if ($role === 'requestor')
                <cart-list-header></cart-list-header>
                @endif


                <!-- account -->
                <dropdown>
                    <dropdown-toggle>
                        <img src="{{ $user->image }}" height="25" width="25" class="img-circle" />
                    </dropdown-toggle>
                    <dropdown-content>
                        <li>
                            <a class="p-v-5 mb-text-primary" href="{{ route('auth.profile') }}">
                                Update My Account
                            </a>
                        </li>
                        <li>
                            <a class="p-v-5 mb-text-primary" href="{{ route('auth.logout') }}">
                                Logout
                            </a>
                        </li>
                    </dropdown-content>
                </dropdown>
            </ul>
        </div>
    </nav> --}}
</header>