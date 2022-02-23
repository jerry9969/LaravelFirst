@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('clients.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        @include('clients.show_fields')
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="h5">#</th>
                                    <th class="h5">Domains Client Owned</th>
                                    <th class="h5">Expiry Date</th>                                        
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($client->domains->sortBy('expiry_date') as $domain)
                                    <tr>
                                        <td class="p-2">{{$i}}</td>
                                        <td  class="p-2">{{$domain->name}}</td>
                                        <td class="p-2">{{$domain->expiry_date}}</td>
                                    </tr>
                                <?php $i=$i+1; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
