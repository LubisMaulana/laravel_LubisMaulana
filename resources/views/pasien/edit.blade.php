@extends('layouts.template')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2 mb-3" role="alert"  style="width: 90%;max-width: 700px; margin:0 auto">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- @if(session()->has('warning'))
        <div class="container alert alert-warning alert-dismissible fade show {{ session()->has('success') ? 'mt-3' : 'mt-5' }}" role="alert"  style="width: 90%; margin: 0 auto;">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}
    <form class="form-edit" action="/pasien/edit/{{ $pasien->id }}" method="post" style="width: 90%;max-width: 700px; margin:0 auto">
        @csrf
        <table class="table table-striped table-hover table-bordered border-success shadow p-3 mb-5 bg-body-tertiary rounded">
            <tbody>
                <tr>
                    <th scope="row" style="width: 120px;">Nama</th>
                    <td><input value="{{ $pasien->nama }}" style="width: 100%; height:35px" type="text" name="nama" id="nama" placeholder="Masukkan nama" required></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td><input value="{{ $pasien->alamat }}" style="width: 100%; height:35px" type="text" name="alamat" id="alamat" placeholder="Masukkan alamat" required></td>
                </tr>
                <tr>
                    <th scope="row">Telepon</th>
                    <td><input value="{{ $pasien->telp }}" style="width: 100%; height:35px" type="text" name="telp" id="telp" placeholder="Masukkan telepon" required></td>
                </tr>
                <tr>
                    <th scope="row">Rumah Sakit</th>
                    <td>
                        <select style="width: 100%; height:35px" aria-label="Large select example" id="rs_id" name="rs_id" required>
                            <option value="" selected>Pilih...</option>
                            @foreach ($listRS as $rs)
                                <option value="{{ $rs->id }}" {{ $pasien->rs_id == $rs->id ? 'selected' : '' }}>{{ $rs->nama }}</option>
                            @endforeach
                        </select>    
                    </td>
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