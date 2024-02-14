@extends('layouts.template')

@section('container')
    <form class="form-edit" action="/pasien/add" method="POST" style="width: 90%;max-width: 700px; margin:0 auto">
        @csrf
        <table class="table table-striped table-hover table-bordered border-success shadow p-3 mb-5 bg-body-tertiary rounded">
            <tbody>
                <tr>
                    <th scope="row" style="width: 120px;">Nama</th>
                    <td><input style="width: 100%; height:35px" type="text" name="nama" id="nama" placeholder="Masukkan nama" required></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td><input style="width: 100%; height:35px" type="text" name="alamat" id="alamat" placeholder="Masukkan alamat" required></td>
                </tr>
                <tr>
                    <th scope="row">Telepon</th>
                    <td><input style="width: 100%; height:35px" type="text" name="telp" id="telp" placeholder="Masukkan telepon" required></td>
                </tr>
                <tr>
                    <th scope="row">Rumah Sakit</th>
                    <td>
                        <select style="width: 100%; height:35px" aria-label="Large select example" id="rs_id" name="rs_id" required>
                            <option value="" selected>Pilih...</option>
                            @foreach ($listRS as $rs)
                                <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
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