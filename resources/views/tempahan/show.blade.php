@extends('layouts/app')

@section('content')
<div class="container">

@if ( session('alert-success'))
<div class="alert alert-success">
{{ session('alert-success') }}
</div>
@endif

<h1>Maklumat Tempahan ID: {{ $tempahan->id }}</h1>
<table class="table table-bordered table-stripped">

<colgroup>
    <col style="width: 20%">
    <col style="width: 80%">
</colgroup>

<thead>
    <tr>
        <th>PERKARA</th>
        <th>BUTIRAN</th>
    </tr>
</thead>

<tbody>

    <tr>
        <td>NAMA PELANGGAN</td>
        <td>{{ $tempahan->nama_pelanggan }}</td>
    </tr>
    <tr>
        <td>EMAIL PELANGGAN</td>
        <td>{{ $tempahan->email_pelanggan }}</td>
    </tr><tr>
        <td>TELEFON PELANGGAN</td>
        <td>{{ $tempahan->telefon_pelanggan }}</td>
    </tr>
    <tr>
        <td>BUKU</td>
        <td>{{ $tempahan->booklist_id }}</td>
    </tr>
    <tr>
        <td>JUMLAH BAYARAN</td>
        <td>{{ $tempahan->jumlah_bayaran }}</td>
    </tr>
    <tr>
        <td>TARIKH BAYARAN</td>
        <td>{{ $tempahan->tarikh_bayaran }}</td>
    </tr>
    <tr>
        <td>MASA BAYARAN</td>
        <td>{{ $tempahan->masa_bayaran }}</td>
    </tr>
    <tr>
        <td>BUKTI BAYARAN</td>
        <td>{{ $tempahan->bukti_bayaran }}</td>
    </tr>
    <tr>
        <td>STATUS</td>
        <td>{{ $tempahan->status }}</td>
    </tr>
    <tr>
        <td>KEMASKINI</td>
        <td>
            <form method="POST" action="{{ route('tempahan.update', $tempahan->id) }}">
            @method('PATCH')
            @csrf
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="PENDING">PENDING</option>
                        <option value="PAID">PAID</option>
                        <option value="CANCELLED">CANCELLED</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Kemaskini
                </button>
            </form>
        </td>
    </tr>

</tbody>

</table>

</div>
@endsection
