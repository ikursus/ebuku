@extends('layouts/app')

@section('header')
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">

<h1>Senarai Users</h1>

<a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>

<table class="table table-bordered table-stripped" id="table-users">

<thead>
    <tr>
        <th>ID</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>ACTION</th>
    </tr>
</thead>

</table>

</div>
@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(function() {
        $('#table-users').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('users.datatables') }}',
            type: 'POST',
            'headers': {
                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action' }
        ]
    });
    });
</script>

@endsection