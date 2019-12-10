@extends('shared.layouts.app')

@section('app-content')
<dashboard-admin></dashboard-admin>

@template(['id' => 'dashboard-admin'])
<div>
    <content-header class="bg-white">
        <content-title title="Dashboard" />
    </content-header>

    <content-body>
        <row>
            <div class="col-md-6">
                <card>
                    
                    <card-header title="Card" />
                    <card-body >
                        <div class="row">
                            {{-- <div class="col-md-3">
                                <form-image  width="200px" height="200px" label="Select image" />
                            </div> --}}
                            <div class="col-md-12">
                                {{-- <form-image style="width:100% height:320px;" label="Select banner" /> --}}
                                <form-image
                                    style="width:100px; height:100px;" 
                                    label="Select image" 
                                    v-model="image"
                                    class="img-circle"
                                    accept = "image/jpeg, image/png, image/gif"
                                >
                                    <img slot-scope="{data}" v-if="data" showImage :src="data" class="w-100 h-100 img-circle" />
                                </form-image>
                            </div>
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
            <div class="col-md-3 p-10">
                <card >
                    <card-body>
                        <bs-button  data-toggle="modal" data-target="#basic" >Open Modal</bs-button>
                        <modal size="lg" align="center" id="basic">
                            <modal-header title="Header" />
                            <modal-body>
                                Testing 
                            </modal-body>
                            <modal-footer>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </modal-footer>
                        </modal>
                    </card-body>
                </card>
                <card>
                    <loading ref="demo" />
                    <card-body>
                        <stars :value="3" />
                        <bs-button @click="runLoading"> Lets go </bs-button>
                    </card-body>
                </card>
            </div> 
        </row>
        <row>
            <div class="col-md-12">
                <card>
                    {{-- <card-header></card-header> --}}
                    <card-body>
                            <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr @contextmenu.prevent="$refs.menu.open">
                                            <td>183</td>
                                            <td>John Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr @contextmenu.prevent="$refs.menu.open">
                                            <td>219</td>
                                            <td>Alexander Pierce</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-warning">Pending</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <vue-context ref="menu">
                                    <li>
                                        <a @click.prevent="onClick($event.target.innerText)">
                                            Do something
                                        </a>
                                    </li>
                                    <li>
                                        <a @click.prevent="onClick($event.target.innerText)">
                                            Do something else
                                        </a>
                                    </li>
                                </vue-context>
                    </card-body>
                </card>
            </div>
        </row>
        <row>
            <div class="col-md-3">
                <tabs activeTab="first" >
                    <tab id="first" name="test">
                        test
                    </tab>
                    <tab id="second" name="Vincent 1" >
                        vincent 1
                    </tab>
                    <tab id="third" name="Vincent 2" >
                        vincent 2
                    </tab>
                    <tab id="fourth" name="Vincent 3" >
                        vincent 3
                    </tab>
                    <tab id="fifth" name="Vincent 4" >
                        vincent 4
                    </tab>
                </tabs>
            </div>
        </row>
    </content-body>
</div>
@endtemplate
@endsection