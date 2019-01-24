@extends('layouts/app')

@section('content')
<div class="container">

<h1>Tempahan Buku</h1>
<table class="table table-bordered table-stripped">

<thead>
    <tr>
        <th>ID</th>
        <th>NAMA PELANGGAN</th>
        <th>EMAIL PELANGGAN</th>
        <th>TELEFON PELANGGAN</th>
        <th>BUKU</th>
        <th>STATUS</th>
        <th>ACTION</th>
    </tr>
</thead>

<tbody>

    @foreach( $query as $tempahan )
    <tr>
        <td>{{ $tempahan->id }}</td>
        <td>{{ $tempahan->nama_pelanggan }}</td>
        <td>{{ $tempahan->email_pelanggan }}</td>
        <td>{{ $tempahan->telefon_pelanggan }}</td>
        <td>{{ $tempahan->booklist_id }}</td>
        <td>{{ $tempahan->status }}</td>
        <td>
            <a href="/tempahan/{{ $tempahan->id }}">KEMASKINI</a>
        </td>
    </tr>
    @endforeach

</tbody>

</table>

{{ $query->links() }}

</div>
@endsection

@section('javascript')

@endsection