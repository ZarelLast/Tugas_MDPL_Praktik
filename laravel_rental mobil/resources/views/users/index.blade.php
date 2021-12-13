@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            {{-- <!-- <h3 class="card-title"><a href="{{ route('car.create') }}" class="btn btn-primary">Add New </a> </h3> --> --}}
            {{-- <!-- <h3 class="card-title"><a href="" class="btn btn-primary">Add New </a> </h3> --> --}}
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pelanggan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['id_pelanggan'] }}</td>
                        <td>{{ $row['nama'] }}</td>
                        <td>{{ $row['alamat'] }}</td>
                        <td>{{ $row['telp'] }}</td>
                        <td>{{ $row['email'] }}</td>
                        <td>{{ $row['password'] }}</td>
                        <td>
                            @if($row['email'] != "admin@gmail.com")
                            <a href="{{ route('pelanggan.edit',  ['id_pelanggan' => $row['id_pelanggan']]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row['id_pelanggan']}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                            @endif
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
                url : "{{url('/admin')}}/pelanggan/delete/"+id,
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
