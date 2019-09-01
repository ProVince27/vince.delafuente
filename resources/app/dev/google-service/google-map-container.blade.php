@extends('shared.layouts.app')
@section('title','Google Map')

@push('plugins.js.top')
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.map.api-key')}}&libraries=places"></script>
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
                    <google-map
                        style="height:375px;"    
                    >
                        <google-marker
                            v-for="(marker,key) in markers"
                            :key="key"
                            :position="marker"
                            :is-draggable.boolean="true" 
                            :title="marker.title"
                            :radius="10000"
                            @dragend="handleDragend(key,...arguments)"
                        >
                            <google-circle
                                :radius="10000"
                            />
                                <google-marker-info-window>
                                    <template slot-scope="{pin,test}">
                                        <h4>Lat</h4>
                                        <p>test ing example</p>
                                    </template>
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