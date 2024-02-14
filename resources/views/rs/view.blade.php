@extends('layouts.template')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2 mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container table-responsive small mb-3">
        <table class="table table-bordered border-success">
            <thead >
                <tr>
                    <th scope="col" hidden></th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Rumah Sakit</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Alamat</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Email</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Telepon</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listRS as $rs)
                    <tr class="row-items">
                        <td hidden></td>
                        <td>{{ $rs->nama }}</td>
                        <td>{{ $rs->alamat }}</td>
                        <td>{{ $rs->email }}</td>
                        <td>{{ $rs->telp }}</td>
                        <td>
                            <a class="btn btn-primary mb-1" href="/rumah-sakit/edit/{{ $rs->id }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="/rumah-sakit/delete/{{ $rs->id }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-delete" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $('.btn-delete').click(function() {
            var confirmation = confirm("Anda yakin ingin menghapus data rumah sakit ini?");
        });
    </script>
@endsection