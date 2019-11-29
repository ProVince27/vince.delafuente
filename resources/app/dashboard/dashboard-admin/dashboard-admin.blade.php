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
                    <card-body>
                        <p>Tis is a content</p>
                        <bs-button>Click</bs-button>
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
    </content-body>
</div>
@endtemplate
@endsection