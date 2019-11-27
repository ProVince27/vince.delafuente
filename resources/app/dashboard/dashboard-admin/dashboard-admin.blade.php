@extends('shared.layouts.app')

@section('app-content')
<dashboard-admin></dashboard-admin>

@template(['id' => 'dashboard-admin'])
<div>
    <content-header>
        <content-title title="Dashboard" />
    </content-header>

    <content-body>
        <row>
            <div class="col-md-6">
                <card>
                    
                    <card-header title="Card" />
                    <card-body>
                        <p>Tis is a content</p>
                        <bs-button>Click</bs-button>
                            <ul>
                                <li v-for="(ssr,index) in sortable" :key="ssr.id" v-html="ssr.name"></li>
                            </ul>
                        
                        <div>
                            
                            {{-- <draggable v-model="sortable" >
                                <div style="height:30px;border:1px solid red;" class="m-10" v-for="srt in sortable" :key="srt.id" v-html="srt.name"></div>
                            </draggable> --}}
                            
                        </div>
                    </card-body>
                    <card-footer class="mx-center">This is footer</card-footer>
                </card>
            </div>
            <div class="col-md-3 p-10">
                <info-box>
                    <info-box-icon class="bg-info elevation-1" icon="fas fa-cog" />
                    <info-box-content>
                        <span class="info-box-text">CPU Traffic</span>
                        <span class="info-box-number">
                            10
                        </span>
                    </info-box-content>
                </info-box>
            </div>
        </row>
    </content-body>
</div>
@endtemplate
@endsection