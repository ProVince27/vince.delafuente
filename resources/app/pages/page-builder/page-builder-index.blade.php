@extends('shared.layouts.app')
@section('title',$title)
@section('app-content')
<page-builder-index></page-builder-index>
@template(['id' => 'page-builder-index'])
<div>
    <content-header class="bg-white">
        <row>
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <heading size="5" class="col-sm-9" icon="fas fa-pen-square" title="{{ $title }}" />  
            </div>
        </row>
    </content-header>
    <content-body>
        
    </content-body>
</div>
@endtemplate
@endsection