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
            <form action="{{ route('returns.update', ['id_transaksi' => $peminjaman->id_transaksi]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>No. Polisi</p>
                            <input type="text" class="form-control" required name="nopol" value="{{ $peminjaman->nopol }}">
                        </div>
                        <div class="form-group">
                            <p>Tanggal Meminjam</p>
                            <input type="datetime-local" class="form-control" required name="tgl_pinjam" value="{{ date('Y-m-d\TH:i:s',strtotime($peminjaman->tgl_pinjam)) }}">
                        </div>
                        <div class="form-group">
                            <p>Harga</p>
                            <input type="text" class="form-control" required name="harga" value="{{ $peminjaman->harga }}">
                        </div>
                        <div class="form-group">
                            <p>Denda</p>
                            <input type="text" disabled class="form-control" required name="denda" value="{{ $peminjaman->denda }}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Waktu</p>
                            <input type="text" disabled class="form-control" name="waktu" value="{{ $peminjaman->waktu }}" >
                        </div>
                        <div class="form-group">
                            <p>Tanggal kembali</p>
                            <input type="datetime-local" class="form-control" required name="tgl_kembali" value="{{ date('Y-m-d\TH:i:s',strtotime($peminjaman->tgl_kembali)) }}" >
                        </div>

                        <div class="form-group">
                            <p>Total</p>
                            <input type="text" disabled class="form-control" required name="total" value="{{ $peminjaman->total }}" >
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection
