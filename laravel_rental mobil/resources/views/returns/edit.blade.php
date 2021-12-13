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
                            <input type="text" class="form-control" readonly name="nopol" value="{{ $peminjaman->hasMobil->nopol }}">
                        </div>
                        <div class="form-group">
                            <p>Tanggal Meminjam</p>
                            <input type="datetime-local" onchange="checkDate()" id="date1" class="form-control" required name="tgl_pinjam" value="{{ date('Y-m-d\TH:i:s',strtotime($peminjaman->tgl_pinjam)) }}">
                        </div>
                        <div class="form-group">
                            <p>Harga</p>
                            <input type="text" class="form-control" required readonly id="harga" name="harga" value="{{ $peminjaman->harga }}">
                        </div>
                        <div class="form-group">
                            <p>Denda</p>
                            <input type="text" readonly class="form-control" required name="denda" value="{{ $peminjaman->denda }}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Waktu</p>
                            <input type="text" readonly class="form-control" id="waktu" name="waktu" value="{{ $peminjaman->waktu }}" >
                        </div>
                        <div class="form-group">
                            <p>Tanggal kembali</p>
                            <input type="datetime-local" onchange="checkDate()" id="date2" class="form-control" required name="tgl_kembali" value="{{ date('Y-m-d\TH:i:s',strtotime($peminjaman->tgl_kembali)) }}" >
                        </div>

                        <div class="form-group">
                            <p>Total</p>
                            <input type="text" readonly class="form-control" id="totalSementara" required name="total" value="{{ $peminjaman->total }}" >
                        </div>
                        <div class="form-group">
                            <p>Status</p>
                            <select name="status" class="form-control">
                                <option>- Select one -</option>
                                <option selected value="" {{ (old("status") == '' ? "selected":"") }}>Dipinjam</option>
                                <option value="selesai" {{ (old("status") == 'selesai' ? "selected":"") }}>Dikembalikan</option>
                            </select>
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
                            var total = Math.floor(Math.floor(waktu/24) * harga);
                            if (total < 0) {
                                total = 0;
                            }
                            $("#waktu").val(waktu);
                            $("#totalSementara").val(total);
                        }

                    </script>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection
