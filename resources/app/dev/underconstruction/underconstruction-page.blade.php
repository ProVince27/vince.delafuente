@extends('shared.layouts.app')
@section('title',$title)
@section('app-content')
<underconstruction-page></underconstruction-page>

@template(['id' => 'underconstruction-page'])
<div>
    <content-header>
        <content-title title="{{$title}}" />
    </content-header>

    <content-body>

    </content-body>
</div>
@endtemplate
@endsection