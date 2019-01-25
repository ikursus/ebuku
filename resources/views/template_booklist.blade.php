@extends('layouts/app')

@section('content')
<div class="container">

<h1>{{ $title }}</h1>
<table class="table table-bordered table-stripped">

<thead>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>ACTION</th>
    </tr>
</thead>

<tbody>

    @foreach( $ebooks as $ebook )
    <tr>
        <td>{{ $ebook->id }}</td>
        <td>{{ $ebook->title }}</td>
        <td>{{ $ebook->description }}</td>
        <td>
            <a href="/order/{{ $ebook->id }}">ORDER</a>
            <a href="booklist/{{ $ebook->id }}">Senarai Tempahan</a>
        </td>
    </tr>
    @endforeach

</tbody>

</table>

{{ $ebooks->links() }}

</div>
@endsection

@section('javascript')

@endsection