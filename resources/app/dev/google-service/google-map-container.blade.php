@extends('shared.layouts.app')
@section('title','Google Map')

{{-- @push('plugins.js.top')
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.map.api-key')}}&libraries=places"></script>
@endpush --}}


@section('app-content')
<google-map-container></google-map-container>
@template(['id' => 'google-map-container'])
<div>
    <content-header>
        <content-title title="Google Map" />
    </content-header>
    <content-body>
        <div class="container">
            <row>
                <div class="col-lg-6 col-sm-12">
                    <google-map 
                        style="height:375px;"
                        @pinned="addMarker"
                        
                    >
                        <template slot-scope="{ google, map }">
                            <google-marker
                                v-for="(marker,key) in markers"
                                :key="key"
                                :marker="marker"
                                {{-- :title="marker.title" --}}
                                :google="google"
                                :map="map"
                                :is-draggable.boolean="true"
                                :radius="10000"
                                @dragend="handleDragend(key,...arguments)"
                            >
                                <template slot-scope="{pin,google}">
                                    {{-- <google-marker-info-window 
                                        :marker="pin"
                                        :google="google"
                                        :content="'<div><h3>Hello</h3><p>hello</p></div>'"
                                    >
                                        
                                    </google-marker-info-window> --}}
                                </template>
                            </google-marker>
                        </template>
                    </google-map>
                </div>
            </row>
        </div>
    </content-body>
</div>

@endtemplate
@endsection