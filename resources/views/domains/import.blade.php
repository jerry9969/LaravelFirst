@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Import Domain Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card form-group">
            @include('flash::message')

            {!! Form::open(['route' => 'domains.importexcel', 'enctype'=>'multipart/form-data']) !!}

            <div class="card-body">

                <div class="row" >
                    {!!Form::label('file','Select Excel File To Upload:') !!}
                    {!!Form::file('file') !!}
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('domains.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
