@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Domain</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'domains.store']) !!}

            <div class="card-body">

                <div class="row">
                    <!-- Client Id(Name) List -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('name', 'Select Client:') !!}
                        {!! Form::select('client_id',$clients ,null,['class' => 'form-control']) !!}
                    </div>

                    @include('domains.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('domains.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
