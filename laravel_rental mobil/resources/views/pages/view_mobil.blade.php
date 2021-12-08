@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<section class="content">
    @foreach($mobil as $row)
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

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <form action="{{ route('returns.store') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row m-3">
                        <div class="col-3">
                            <div class="form-group">
                                <p>Tanggal Pinjam</p>
                                <input type="datetime-local" class="form-control" id="date1" onchange="checkDate()" required name="tgl_pinjam" value="{{ date('Y-m-d\TH:i:s',strtotime(old('tgl_pinjam'))) }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <p>Tanggal Kembali</p>
                                <input type="datetime-local" class="form-control" id="date2" onchange="checkDate()" required name="tgl_kembali" value="{{ date('Y-m-d\TH:i:s',strtotime(old('tgl_kembali'))) }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row list-inline">
                                <div class="col-8 ist-inline-item mt-4">
                                    <div class="card-body">
                                        <h3 class="text-bold">Total: <span id="total">Rp. 0</span></h3>
                                        <input type="hidden" name="total" id="totalSementara" value=""/>
                                        <input type="hidden" name="waktu" id="waktu" value=""/>
                                        <input type="hidden" name="harga" value="{{$row->harga}}" id="harga">
                                        <input type="hidden" name="id_mobil" value="{{$row->id_kendaraan}}"/>
                                    </div>
                                </div>
                                <script>
                                    var date1 = 0;
                                    var date2 = 0;
                                    hitung=()=>{
                                        var waktu = (date2 - date1);
                                        var jam = Math.floor(waktu/1000/60/60);
                                        // waktu -= jam*1000*60*60
                                        console.log(jam);
                                        return jam;
                                    }
                                    checkDate =()=>{
                                        date1 = Date.parse($("#date1").val());
                                        console.log(date1);
                                        date2 = Date.parse($("#date2").val());
                                        console.log(date2);
                                        waktu = hitung()
                                        var harga = $("#harga").val();
                                        var total = Math.floor(Math.floor(waktu/12) * harga);
                                        if (total < 0) {
                                            total = 0;
                                        }
                                        $("#waktu").val(waktu);
                                        $("#totalSementara").val(total);
                                        $("#total").html('Rp. '+total.toLocaleString());
                                    }

                                </script>
                                <div class="col-4 form-group list-inline-item my-5">
                                    <input class="btn btn-success" type="submit" value="Pesan">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection
