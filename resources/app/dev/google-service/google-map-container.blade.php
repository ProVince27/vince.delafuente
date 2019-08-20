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
                <div class="col-md-6">
                    <google-map 
                        style="height:375px;"
                        @addMarker="addMarker"
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
                            />
                        </template>
                    </google-map>
                </div>
            </row>
        </div>
    </content-body>
</div>

@endtemplate
@endsection