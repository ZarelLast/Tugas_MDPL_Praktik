@extends('layouts.app')
@section('content')
    <h5>Data User</h5>
    <div id="card-advance" class="card card-default">
        <div class="card-body">
            <form action="{{ url('profile/update', ['id' => $data_user->id_pelanggan]) }}" method="POST">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                {{ method_field('POST') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>NIK</p>
                            <input readonly type="text" class="form-control" name="id_pelanggan" value="{{ $data_user->id_pelanggan }}">
                        </div>
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="nama" value="{{ $data_user->nama }}" >
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" name="alamat" value="{{ $data_user->alamat }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Email</p>
                            <input type="text" class="form-control" required name="email" value="{{ $data_user->email }}">
                        </div>
                        <div class="form-group">
                            <p>No. Telp</p>
                            <input type="text" class="form-control" name="telp" value="{{ $data_user->telp }}">
                        </div>
                        <div class="form-group">
                            <p>Password</p>
                            <input type="password" class="form-control" required name="password_new" value="{{ $data_user->password }}" >
                            <input type="hidden" class="form-control" required name="password_old" value="{{ $data_user->password }}" >
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
@endsection
