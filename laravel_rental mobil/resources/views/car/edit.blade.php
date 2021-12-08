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
            <form action="{{ route('car.update', ['id_kendaraan' => $car->id_kendaraan]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Merek Mobil</p>
                            <input type="text" class="form-control" required name="merek" value="{{ $car->merek }}" >
                        </div>
                        <div class="form-group">
                            <p>Nomor Polisi</p>
                            <input type="text" class="form-control" required name="nopol" value="{{ $car->nopol }}">
                        </div>
                        <div class="form-group">
                            <p>Harga</p>
                            <input type="number" class="form-control" required name="harga" value="{{ $car->harga }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Gambar</p>
                            <input type="file" class="form-control" name="gambar" value="{{ $car->gambar }}">
                        </div>
                        <div class="form-group">
                            <p>Type</p>
                            <select name="type" class="form-control">
                                <option>- Select one -</option>
                                <option value="manual" {{ ($car->type == 'manual' ? "selected":"") }}>Manual</option>
                                <option value="matic" {{ ($car->type == 'matic' ? "selected":"") }}>Matic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Deskripsi</p>
                            <input type="text" class="form-control" required name="deskripsi" value="{{ $car->deskripsi }}">
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection
