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
                    <google-map-autocomplete
                        :google="initGoogle"
                        :map="map"
                        @placeChanged="getPlaceChanged"
                    />
                    
                    <google-map
                        :init-google="initGoogle"
                        style="height:375px;"
                        @pinned="addMarker"
                        @getMap="setMap"
                    >
                        <template slot-scope="{ google, map }">
                            {{-- <google-circle
                                v-for="(marker,key) in markers"
                                :key="key"
                                :map="map"
                                :radius=
                                :google="google"
                                :center="{center:{lat:marker.lat,lng:marker.lng}}"
                            ></google-circle> --}}
                            <google-marker
                                v-for="(marker,key) in markers"
                                :key="key"
                                :marker="marker"
                                {{-- :title="marker.title" --}}
                                :google="google"
                                :map="map"
                                :is-draggable.boolean="true"
                                {{-- :radius="10000" --}}
                                @dragend="handleDragend(key,...arguments)"
                            >
                                <template slot-scope="{pin,google}">
                                        <google-circle
                                            :radius="10000"
                                            :google="google"
                                            :map="map"                                      
                                            :marker="pin"
                                        />
                                        <google-marker-info-window 
                                            :marker="pin"
                                            :google="google"
                                            :map="map"                                   
                                        >
                                            <div class="info-window-content d-none" >
                                                <h4>Test test sample</h4>
                                                <p>test ing example</p>
                                            </div>
                                        </google-marker-info-window>
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