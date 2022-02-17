<div class="table-responsive">
    <table class="table" id="domains-table">
        <thead>
        <tr>
            <th>Client Id</th>
        <th>Name</th>
        <th>Expiry Date</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($domains as $domain)
            <tr>
                <td>{{ $domain->client_id }}</td>
            <td>{{ $domain->name }}</td>
            <td>{{ $domain->expiry_date }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['domains.destroy', $domain->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('domains.show', [$domain->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('domains.edit', [$domain->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
