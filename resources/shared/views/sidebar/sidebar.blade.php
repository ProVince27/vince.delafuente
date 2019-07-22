@php 
    // $user = Auth::user() 
@endphp

<aside class="main-sidebar">
    <section class="sidebar" style="height: auto" v-cloak>
        <slim-scroll>
            <div class="user-panel p-t-25">
                <div class = "pull-left" style = "width: 45px; height: 45px;">
                    <img-square
                        {{-- src = "{{ $user->image }}" --}}
                        class = "img-circle"
                    ></img-square>
                </div>
                <div class="pull-left info full-width">
                    <p class="text-primary user--name">
                        {{-- {{ $user->full_name }} --}}
                    </p>
                    <span class="text-dark400">
                        {{-- {{ $user->job_title ?: $user->getRoleDisplayName() }} --}}
                     </span>
                </div>
            </div>
            {{-- <ul class="sidebar-menu"> --}}
                {!! $sidebar !!}
            {{-- </ul> --}}

            @php
                $user->loadMissing('clients');
                $user->loadMissing('teams');
            @endphp
                
            <div class = "sidebar-team">
                {{-- @foreach($user->teams as $team)
                    <div class = "sidebar-team-image">
                        <tooltip title = "Company : {{ $team->name }}">
                            <img-square
                                src = "{{ $team->image }}"
                                class = "m-v-5"
                                :defer = "true"
                            ></img-square>
                        </tooltip>
                    </div>
                @endforeach --}}
            </div>
            <div class = "sidebar-team" style = "margin-top: 5px;">
                {{-- @foreach($user->clients as $client)
                    <div class = "sidebar-team-image">
                        <tooltip title = "Client : {{ $client->name }}">
                            <img-square
                                src = "{{ $client->image }}"
                                class = "m-v-5"
                                :defer = "true"
                            ></img-square>
                        </tooltip>
                    </div>
                @endforeach --}}
            </div>
        </slim-scroll>
    </section>
</aside>