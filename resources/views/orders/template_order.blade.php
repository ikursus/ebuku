@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tempahan Produk: {{ $buku->title }}</div>

                <div class="card-body">

                <p>Sila buat bayaran sebanyak {{ $buku->price }} ke akaun berikut dan isikan borang dibawah:</p>

                <ul>
                    <li>Maybank</li>
                    <li>8888-8888-8888</li>
                </ul>

                <hr>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form method="POST" action="" enctype="multipart/form-data">                    
                        @csrf

                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-md-4 col-form-label text-md-right">Nama Pelanggan</label>

                            <div class="col-md-6">
                                <input id="nama_pelanggan" type="text" class="form-control{{ $errors->has('nama_pelanggan') ? ' is-invalid' : '' }}" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" autofocus>

                                @if ($errors->has('nama_pelanggan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_pelanggan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_pelanggan" class="col-md-4 col-form-label text-md-right">Email Pelanggan</label>

                            <div class="col-md-6">
                                <input id="email_pelanggan" type="email" class="form-control{{ $errors->has('email_pelanggan') ? ' is-invalid' : '' }}" name="email_pelanggan" value="{{ old('email_pelanggan') }}" autofocus>

                                @if ($errors->has('email_pelanggan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email_pelanggan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefon_pelanggan" class="col-md-4 col-form-label text-md-right">Telefon Pelanggan</label>

                            <div class="col-md-6">
                                <input id="telefon_pelanggan" type="text" class="form-control{{ $errors->has('telefon_pelanggan') ? ' is-invalid' : '' }}" name="telefon_pelanggan" value="{{ old('telefon_pelanggan') }}"  autofocus>

                                @if ($errors->has('telefon_pelanggan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefon_pelanggan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kuantiti" class="col-md-4 col-form-label text-md-right">Kuantiti</label>

                            <div class="col-md-6">
                                <input id="kuantiti" type="text" class="form-control{{ $errors->has('kuantiti') ? ' is-invalid' : '' }}" name="kuantiti" value="{{ old('kuantiti') }}"  autofocus>

                                @if ($errors->has('kuantiti'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kuantiti') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tarikh_bayaran" class="col-md-4 col-form-label text-md-right">Tarikh Bayaran</label>

                            <div class="col-md-6">
                                <input id="tarikh_bayaran" type="date" class="form-control{{ $errors->has('tarikh_bayaran') ? ' is-invalid' : '' }}" name="tarikh_bayaran" value="{{ old('tarikh_bayaran') }}"  autofocus>

                                @if ($errors->has('tarikh_bayaran'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tarikh_bayaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="masa_bayaran" class="col-md-4 col-form-label text-md-right">Masa Bayaran</label>

                            <div class="col-md-6">
                                <input id="masa_bayaran" type="time" class="form-control{{ $errors->has('masa_bayaran') ? ' is-invalid' : '' }}" name="masa_bayaran" value="{{ old('masa_bayaran') }}"  autofocus>

                                @if ($errors->has('masa_bayaran'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('masa_bayaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_bayaran" class="col-md-4 col-form-label text-md-right">Jumlah Bayaran</label>

                            <div class="col-md-6">
                                <input id="jumlah_bayaran" type="text" value="{{ $buku->price }}" class="form-control{{ $errors->has('jumlah_bayaran') ? ' is-invalid' : '' }}" name="jumlah_bayaran" value="{{ old('jumlah_bayaran') }}"  autofocus>

                                @if ($errors->has('jumlah_bayaran'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jumlah_bayaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bukti_bayaran" class="col-md-4 col-form-label text-md-right">Bukti Bayaran</label>

                            <div class="col-md-6">
                                <input id="bukti_bayaran" type="file" class="form-control{{ $errors->has('bukti_bayaran') ? ' is-invalid' : '' }}" name="bukti_bayaran" value="{{ old('bukti_bayaran') }}">

                                @if ($errors->has('bukti_bayaran'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bukti_bayaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Hantar Tempahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
