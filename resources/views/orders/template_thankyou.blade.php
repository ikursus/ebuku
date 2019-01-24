@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">No ID Tempahan: {{ $tempahan->id }}</div>

                <div class="card-body">

                <p>Terima kasih. Tempahan anda sedang diproses.</p>

            </div>
        </div>
    </div>
</div>
@endsection
