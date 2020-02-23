@extends('shared.layouts.app')
@section('title',$title)
@section('app-content')
{{-- {{ dd(env('TINYMCE_API_KEY')) }} --}}
@push('plugins.js')
{{-- <script src="https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.js"></script> --}}
<script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
{{-- <script src="https://sp.tinymce.com/i?aid={{env('TINYMCE_API_KEY')}}&tna=tinymce_cloud&p=web&dtm=1582217327275&stm=1582217327275&tz=Asia%2FManila&e=se&se_ca=focus&eid=01c4b51b-3d42-4c96-a9d5-9c7994ff1925&fp=none&tv=js-2.6.1"></script> --}}
@endpush
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
        <div class="row">
            <div class="col-md-12">
                <card>
                    <card-body>
                        {{-- <ckeditor :editor="editor" :config="editorConfig"></ckeditor> --}}
                        {{-- <inline-editor ></inline-editor> --}}
                        {{-- <balloon-editor/> --}}
                        {{-- <ckeditor /> --}}
                        <tiny-editor/>
                    </card-body>
                </card>
            </div>
        </div><div class="row">
            <div class="col-md-12">
                <card>
                    <card-body>
                        {{-- <ckeditor :editor="editor" :config="editorConfig"></ckeditor> --}}
                        {{-- <inline-editor ></inline-editor> --}}
                    </card-body>
                </card>
            </div>
        </div>
    </content-body>
</div>
@endtemplate
@endsection