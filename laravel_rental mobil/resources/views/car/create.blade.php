@extends('layouts.app')

@section('content')

<section class="content col-md-12">

    @if ($errors->any())

        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

    @endif

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Form {{$title}} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Merek Mobil</p>
                            <input type="text" class="form-control" required name="merek" value="{{ old('merek') }}" >
                        </div>
                        <div class="form-group">
                            <p>Nomor Polisi</p>
                            <input type="text" class="form-control" required name="nopol" value="{{ old('nopol') }}">
                        </div>
                        <div class="form-group">
                            <p>Harga</p>
                            <input type="number" class="form-control" required name="harga" value="{{ old('harga') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Gambar</p>
                            <input type="file" class="form-control" required name="gambar" value="{{ old('gambar') }}">
                        </div>
                        <div class="form-group">
                            <p>Type</p>
                            <select name="type" class="form-control">
                                <option>- Select one -</option>
                                <option value="manual" {{ (old("type") == 'manual' ? "selected":"") }}>Manual</option>
                                <option value="matic" {{ (old("type") == 'matic' ? "selected":"") }}>Matic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Deskripsi</p>
                            <input type="text" class="form-control" required name="deskripsi" value="{{ old('deskripsi') }}">
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection
