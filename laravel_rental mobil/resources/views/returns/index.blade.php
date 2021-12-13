@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">

        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>No. Polisi</th>
                        <th>Harga</th>
                        <th>Tgl Peminjaman</th>
                        <th>Tgl Kembali</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $key=>$row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->id_transaksi }}</td>
                        @if(isset($row->hasUser->nama))
                        <td>{{ $row->hasUser->nama }}</td>
                        @else
                        <td>User Has Deleted</td>
                        @endif
                        @if(isset($row->hasMobil->nopol))
                        <td>{{ $row->hasMobil->nopol }}</td>
                        @else
                        <td>Car Has Deleted</td>
                        @endif
                        <td>Rp. {{ number_format($row->harga) }}</td>
                        <td>{{ $row->tgl_pinjam }}</td>
                       	<td>{{ $row->tgl_kembali }}</td>
                       	<td>Rp. {{ number_format($row->total) }}</td>
                       	<td>{{ $row->status }}</td>
                        <td>
                            <a href="{{ route('returns.edit',  ['id_transaksi' => $row->id_transaksi]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row->id_transaksi}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $(".delete-btn").click(function(){
        let id = $(this).attr('data-id');
        var token = "{{csrf_token()}}";
        if(confirm("Apa anda yakin akan menghapus? ")) {
            $.ajax({
                type: "DELETE",
                url : "{{url('/admin')}}/returns/delete/"+id,
                data : {
                    _token : token,
                    "id": id,
                }
            }).then(function(data){
                location.reload();
            });
        }
    })
</script>
@endpush
