@extends('themes.adminlte.layouts.induk')

@section('header')
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Users
<small>Senarai User</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-12">

<div class="box box-success">
<div class="box-header">
<i class="fa fa-comments-o"></i>

<h3 class="box-title">Chat</h3>

<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
<div class="btn-group" data-toggle="btn-toggle">
<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
</button>
<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
</div>
</div>
</div>
<div class="box-body chat" id="chat-box">

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
<!-- /.chat -->
<div class="box-footer">
<div class="input-group">
<input class="form-control" placeholder="Type message...">

<div class="input-group-btn">
<button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
</div>
</div>
</div>
</div>

</div>
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