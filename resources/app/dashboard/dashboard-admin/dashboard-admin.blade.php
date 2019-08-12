@extends('shared.layouts.app')

@section('app-content')
<dashboard-admin></dashboard-admin>

@template(['id' => 'dashboard-admin'])
<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <card>
                    <card-header title="Testing" />
                    <card-body>Tis is a content</card-body>
                    <card-footer>This is footer</card-footer>
                </card>
            </div>
        </div>
    </div>
    
</div>
@endtemplate
@endsection