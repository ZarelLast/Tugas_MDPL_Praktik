@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <section class="content">
        @foreach($data as $row)
        <div class="card card-secondary card-outline">
            <div class="row">
                <div class="col-3">
                    <img src="{{  url('storage/watermarked/'.$row->gambar) }}" alt="{{$row->merek}}" class="img-fluid">
                </div>
                <div class="col-6">
                    <div class="card-header">
                        <h6 class="card-subtitle text-muted">Tipe: {{$row->type}}</h6>
                        <h2 class="card-title text-bold">{{$row->merek}}</h2>
                    </div>
                    <div class="card-body">
                        {{$row->deskripsi}}
                    </div>
                </div>
                <div class="col-3">
                    <div class="card-body">
                        <h4 class="small">Mulai dari</h4>
                        <div class="list-inline">
                            <h3 class="list-inline-item"><span class="text-bold">Rp. {{number_format($row->harga)}}</span></h3>
                            <h4 class="list-inline-item"><span class="text-muted small">/hari</span></h4>
                        </div>
                        <a href="{{ route('liat_mobil',  ['id_kendaraan' => $row['id_kendaraan']]) }}" class="btn btn-success">Pilih</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
@endsection
