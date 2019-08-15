@extends('shared.layouts.app')

@section('app-content')
<dashboard-admin></dashboard-admin>

@template(['id' => 'dashboard-admin'])
<div>
    <content-header>
        <content-title title="Dashboard" icon="fas fa-tachometer-alt" />
    </content-header>

    <content-body>
        <row>
            <div class="col-md-6">
                <card>
                    <card-header title="Testing" />
                    <card-body>Tis is a content</card-body>
                    <card-footer>This is footer</card-footer>
                </card>
            </div>
            <div class="col-md-3">
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