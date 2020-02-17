@extends('shared.layouts.app')
@section('title',$title)
@section('app-content')

{{-- @push('plugins.js')
<script src="https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.js"></script>
@endpush --}}
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
        {{-- <ckeditor :editor="editor" :config="editorConfig"></ckeditor> --}}
        {{-- <inline-editor ></inline-editor> --}}
        {{-- <balloon-editor/> --}}
       {{--  <div class="row">
            <div class="col-md-12">
                <card>
                    <card-body>
                        
                    </card-body>
                </card>
            </div>
        </div> --}}
        <grapejs-builder />
    </content-body>
</div>
@endtemplate
@endsection