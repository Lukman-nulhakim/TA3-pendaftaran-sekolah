@extends('admin.master')
@section('title','SchoolSis')
@section('siswa','active')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card bg-primary mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="text-white"><i class="nav-icon fa fa-users" aria-hidden="true"></i> Detail Siswa</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table>
                            <thead>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td><h3 style="font-family: 'Times New Roman', Times, serif;"><span style="font-family: 'Times New Roman', Times, serif; color:peru; font-style:italic">Nama :</span> {{ $siswa->nama }}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3 style="font-family: 'Times New Roman', Times, serif;"><span style="font-family: 'Times New Roman', Times, serif; color:peru; font-style:italic">Tanggal Lahir :</span> {{ $siswa->tanggal_lahir }}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3 style="font-family: 'Times New Roman', Times, serif;"><span style="font-family: 'Times New Roman', Times, serif; color:peru; font-style:italic">Jenis Kelamin :</span> {{ $siswa->jenis_kelamin }}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3 style="font-family: 'Times New Roman', Times, serif;"><span style="font-family: 'Times New Roman', Times, serif; color:peru; font-style:italic">Alamat : </span> {{ $siswa->alamat }}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3 style="font-family: 'Times New Roman', Times, serif;"><span style="font-family: 'Times New Roman', Times, serif; color:peru; font-style:italic">Kecamatan : </span> {{ $siswa->kecamatan->kecamatan }}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3 style="font-family: 'Times New Roman', Times, serif;"><span style="font-family: 'Times New Roman', Times, serif; color:peru; font-style:italic">Kota : </span> {{ $siswa->kota->kota }}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3 style="font-family: 'Times New Roman', Times, serif;"><span style="font-family: 'Times New Roman', Times, serif; color:peru; font-style:italic">Agama : </span>{{ $siswa->agama }}</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr class="d-flex justify-content-center">
                                <td><img src="{{ Storage::url($siswa->ijazah) }}" class="img-fluid" alt="" style="width:520px; height:700px;"></td>
                                <td><img src="{{ Storage::url($siswa->skhun) }}" class="img-fluid" alt="" style="width:520px; height:700px;"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection