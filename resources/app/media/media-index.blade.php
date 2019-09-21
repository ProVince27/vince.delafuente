@extends('shared.layouts.app')
@section('title','Media Manager')

@section('app-content')
<media-index></media-index>
@template(['id' => 'media-index'])
    <div>
        <content-header>
            <content-title title="Media Manager" />
        </content-header>
        <content-body>
            <card >
                <file-manager/>
            </card>
        </content-body>
    </div>
@endtemplate
@endsection