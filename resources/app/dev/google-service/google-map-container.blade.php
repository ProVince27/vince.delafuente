@extends('shared.layouts.app')
@section('title','Google Map')

@push('plugins.js.top')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.map.api-key')}}&libraries=places"></script>
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
        <div class="container">
            <row>
                <div class="col-lg-6 col-sm-12">
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
                </div>
            </row>
        </div>
    </content-body>
</div>

@endtemplate
@endsection