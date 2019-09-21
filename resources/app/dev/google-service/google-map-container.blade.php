@extends('shared.layouts.app')
@section('title','Google Map')

@push('plugins.js.top')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.map.api-key')}}&libraries=places,visualization"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endpush


@section('app-content')
<google-map-container></google-map-container>
@template(['id' => 'google-map-container'])
<div>
    <content-header>
        <content-title title="Google Map" />
    </content-header>
    <content-body>
        <row>
            <div class="col-lg-6 col-sm-12">
                <card :is-loading="isLoading">
                    <card-header title="Google Map" />
                    <card-body>
                        {{-- <bs-button @click="doTest"> test </bs-button> --}}
                {{-- <div ref="gmap"></div> --}}
                    <google-map-autocomplete 
                        v-model="search"
                        @placeChanged="changedPlace"
                    />
                    <google-map
                        style="height:375px;"
                        ref="gmap"
                        :zoom="zoom"
                        :center="center"
                    >
                        <google-heat-map 
                            v-if="heatPoints"
                            :points="heatPoints"
                        />
                        <google-polygon 
                            v-if="paths"
                            :paths="paths"
                        />
                        <google-marker
                            :lat="marker.lat"
                            :lng="marker.lng"
                        >
                            <google-circle :radius="3000" />
                            <google-marker-info-window>
                                <p>Pin</p>
                            </google-marker-info-window>
                        </google-marker>
                    </google-map> 
                    </card-body>
                </card>             
            </div>
        </row>
    </content-body>
</div>

@endtemplate
@endsection