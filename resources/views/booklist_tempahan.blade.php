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

    @foreach( $booklist->tempahan as $tempahan )
    <tr>
        <td>{{ $tempahan->id }}</td>
        <td>{{ $tempahan->nama_pelanggan }}</td>
        <td>{{ $tempahan->email_pelanggan }}</td>
        <td>{{ $tempahan->telefon_pelanggan }}</td>
        <td>{{ $booklist->title }}</td>
        <td>{{ $tempahan->status }}</td>
        <td>
            <a href="/tempahan/{{ $tempahan->id }}" class="btn btn-sm btn-primary">KEMASKINI</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $tempahan->id }}">
            DELETE
            </button>

            <form method="POST" action="{{ route('tempahan.destroy', $tempahan->id) }}">
                @csrf
                @method('DELETE')

                            <!-- Modal -->
            <div class="modal fade" id="modal-delete-{{ $tempahan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Adakah anda bersetuju untuk menghapuskan data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </div>
                </div>
            </div>
            </div>
            
        </form>


            
            
        </td>
    </tr>
    @endforeach

</tbody>

</table>

{{ $booklist->tempahan->links() }}

</div>
@endsection

@section('javascript')

@endsection