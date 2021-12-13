@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('car.create') }}" class="btn btn-primary">Add New </a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Merek</th>
                        <th>No. Polisi</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $row)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td><img src="{{  url('storage/mobil/'.$row['gambar']) }}" alt=""></td>
                        <td>{{ $row['merek'] }}</td>
                        <td>{{ $row['nopol'] }}</td>
                        <td>{{ $row['deskripsi'] }}</td>
                        <td>{{ number_format($row['harga']) }}</td>
                        <td>{{ $row['type'] }}</td>
                        <td>{{ $row['status'] }}</td>
                        <td>
                            <a href="{{ route('car.edit',  ['id_kendaraan' => $row['id_kendaraan']]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row['id_kendaraan']}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
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
        if(confirm("Apa anda yakin akan menghapus? ")) {
            $.ajax({
                url : "{{url('/admin/car/delete')}}/"+id,
                method : "DElETE",
                data : {
                    _token : "{{csrf_token()}}",
                    "id": id
                }
            })
            .then(function(data){
                location.reload();
            });
        }
    })
</script>
@endpush
