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
            <form action="{{ route('pelanggan.update', ['id_pelanggan' => $pelanggan->id_pelanggan]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="nama" value="{{ $pelanggan->nama }}" >
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" required name="alamat" value="{{ $pelanggan->alamat }}">
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="text" class="form-control" required name="email" value="{{ $pelanggan->email }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <p>No. Telp</p>
                            <input type="text" class="form-control" required name="telp" value="{{ $pelanggan->telp }}">
                        </div>
                        <div class="form-group">
                            <p>Password</p>
                            <input type="text" class="form-control" required name="password_new" value="{{ $pelanggan->password }}" >
                            <input type="hidden" class="form-control" required name="password_old" value="{{ $pelanggan->password }}" >
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection
