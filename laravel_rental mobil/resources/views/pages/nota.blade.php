@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="card">
    <div id="printArea" class="col-6 mx-auto my-5 ">
        <p class="lead">Amount Due {{date('d-m-Y H:i:s')}}</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">No. Transaksi:</th>
              <td>{{$data[0]->id_transaksi}}</td>
            </tr>
            <tr>
                <th>Nama:</th>
                <td>{{$data[0]->hasUser->nama}}</td>
            </tr>
            <tr>
                <th>Merek:</th>
                <td>{{$data[0]->hasMobil->merek}}</td>
            </tr>
            <tr>
                <th>No. Polisi Mobil:</th>
                <td>{{$data[0]->hasMobil->nopol}}</td>
            </tr>
            <tr>
                <th>Tanggal Pinjam:</th>
                <td>{{$data[0]->tgl_pinjam}}</td>
            </tr>
            <tr>
                <th>Tanggal Kembali:</th>
                <td>{{$data[0]->tgl_kembali}}</td>
            </tr>
            <tr>
                <th>Waktu:</th>
                <td>{{($data[0]->waktu)/24}} Hari</td>
            </tr>
            <tr>
                <th>Harga:</th>
                <td>Rp. {{number_format($data[0]->hasMobil->harga)}}</td>
            </tr>
            <tr>
                <th>Denda (2% / Jam)</th>
                <td>Rp. {{number_format($data[0]->denda)}}</td>
            </tr>
            <tr>
                <th>Total:</th>
                <td>Rp. {{number_format($data[0]->total)}}</td>
            </tr>
          </table>
        </div>
        <p>Harap tunjukan nota ini saat akan meminjam mobil di tempat peminjaman. Biaya keterlambatan akan dimasukan ke denda.</p>
    </div>
</div>
@endsection
