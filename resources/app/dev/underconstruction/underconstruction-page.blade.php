@extends('shared.layouts.app')
@section('title',$title)
@section('app-content')
<underconstruction-page></underconstruction-page>

@template(['id' => 'underconstruction-page'])
<div>
    <content-header class="bg-white">
        <row>
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <heading size="5" class="col-sm-9" icon="fas fa-store-alt" title="{{ $title }}" />
                <div class="">
                    <bs-button variant="outline-danger">New</bs-button>
                </div>                
            </div>
        </row>
    </content-header>

    <content-body>

    </content-body>
</div>
@endtemplate
@endsection