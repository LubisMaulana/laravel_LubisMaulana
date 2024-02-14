@extends('layouts.template')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2 mb-3" role="alert"  style="width: 90%;max-width: 700px; margin:0 auto">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form class="form-edit" action="/rumah-sakit/edit/{{ $rs->id }}" method="POST" style="width: 90%;max-width: 700px; margin:0 auto">
        @csrf
        <table class="table table-striped table-hover table-bordered border-success shadow p-3 mb-5 bg-body-tertiary rounded">
            <tbody>
                <tr>
                    <th scope="row" style="width: 120px;">Nama</th>
                    <td><input style="width: 100%; height:35px" type="text" name="nama" id="nama" value="{{ $rs->nama }}" placeholder="Masukkan nama rumah sakit" required></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td><input style="width: 100%; height:35px" type="text" name="alamat" id="alamat" value="{{ $rs->alamat }}" placeholder="Masukkan alamat" required></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><input style="width: 100%; height:35px" type="email" name="email" id="email" value="{{ $rs->email }}" placeholder="Masukkan email" required></td>
                </tr>
                <tr>
                    <th scope="row">Telepon</th>
                    <td><input style="width: 100%; height:35px" type="text" name="telp" id="telp" value="{{ $rs->telp }}" placeholder="Masukkan telepon" required></td>
                </tr>
                <tr>
                    <th colspan="2"><button type="submit" style="
                        padding: 5px;
                        font-size: 20px;
                        border-style: none;
                        border-radius: 10px;
                        background-color:rgb(59, 213, 213);
                        color: white;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        text-decoration: none;
                        gap: 15px;
                        margin:0 auto
                    ">Simpan</button></th>
                </tr>
            </tbody>
        </table>
    </form>
@endsection