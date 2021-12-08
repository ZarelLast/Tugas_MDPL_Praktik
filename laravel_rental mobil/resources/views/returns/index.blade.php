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
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row['id_transaksi'] }}</td>
                        <td>{{ $row['id_pelanggan'] }}</td>
                        <td>{{ $row['nopol'] }}</td>
                        <td>Rp. {{ number_format($row['harga']) }}</td>
                        <td>{{ $row['tgl_pinjam'] }}</td>
                       	<td>{{ $row['tgl_kembali'] }}</td>
                       	<td>Rp. {{ number_format($row['total']) }}</td>
                        <td>
                            <a href="{{ route('returns.edit',  ['id_transaksi' => $row['id_transaksi']]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row['id_transaksi']}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @push('scripts')
                <script>
                    $(".delete-btn").click(function(){
                        let id = $(this).attr('data-id');
                        if(confirm("Apa anda yakin akan menghapus? ")) {
                            $.ajax({
                                url : "{{url('/')}}/returns/"+id,
                                method : "POST",
                                data : {
                                    _token : "{{csrf_token()}}",
                                    _method : "DELETE",
                                }
                            })
                            .then(function(data){
                                location.reload();
                            });
                        }
                    })
                </script>
                @endpush
            </table>
        </div>
    </div>
</section>

@endsection
