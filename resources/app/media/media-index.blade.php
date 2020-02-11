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
                <div id="ckfinder1"></div>
            </card>
        </content-body>
    </div>
@endtemplate
@endsection
@push('plugin.js.top')
<script scr="{{ asset('js/ckfinder/ckfinder.js') }}" />
@endpush
@section('scripts')
<script>
    CKFinder.widget( 'ckfinder1', {
       width: '100%',
       height: 800,
       connectorPath: route('ckfinder_connector').template
    } );
</script>
@endsection