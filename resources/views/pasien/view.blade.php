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
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Nama</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Alamat</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Telepon</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white">Rumah Sakit</th>
                    <th scope="col" style="background-color: rgb(59, 213, 213); color:white"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)
                    <tr class="row-items">
                        <td hidden></td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->telp }}</td>
                        <td>{{ $pasien->rs->nama }}</td>
                        <td>
                            <a class="btn btn-primary mb-1" href="/pasien/edit/{{ $pasien->id }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="/pasien/delete/{{ $pasien->id }}" method="POST">
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
            var confirmation = confirm("Anda yakin ingin menghapus data pasien ini?");
        });
    </script>
@endsection