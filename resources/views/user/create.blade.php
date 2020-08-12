@extends('user.master')
@section('title','SchoolSis')
@section('css')
    <style>
        .pelangi{
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            background: #6a00ff;
            background: -moz-linear-gradient(left, #6a00ff 0%, #ffd900 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, #6a00ff), color-stop(100%, #ffd900));
            background: -webkit-linear-gradient(left, #6a00ff 0%, #ffd900 100%);
            background: -o-linear-gradient(left, #6a00ff 0%, #ffd900 100%);
            background: -ms-linear-gradient(left, #6a00ff 0%, #ffd900 100%);
            background: -webkit-gradient(linear, left top, right top, from(#6a00ff), to(#ffd900));
            background: linear-gradient(to right, #6a00ff 0%, #ffd900 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6a00ff', endColorstr='#ffd900', GradientType=1 );
        }

    </style>
@endsection
@section('content')

{{-- jumbotron --}}
<section class="pelangi">
        <div class="container">
            <div class="row d-flex justify-content-end">
                <div class="col-md-6 col-12">
                    <h1 style="font-family: 'Times New Roman', Times, serif; color:white; margin-top:70px; font-style:italic">Isi Biodata Pendidikan Mu ..</h1>
                    <hr style="border-bottom: 2px solid rgb(238, 116, 16)">
                    <h2 style="font-family: 'Times New Roman', Times, serif; color:white">Disini kami akan membantu menemukan Sekolah sesuai dengan kualifikasi nilai Kamu ..</h2>
                    <h2 style="font-family: 'Times New Roman', Times, serif; color:white">Daftar sekolah lebih mudah saat kondisi Pandemi seperti ini ..</h2>
                    <hr style="border-bottom: 2px solid rgb(238, 116, 16)">
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:white">- Cek di blog kami tentang pemberitahuan Pendaftaran kamu .</h3>
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:white">- Kamu bisa memilih sekolah yg kamu mau Jika nilaimu sama dengan standart Sekolah Tersebut ..</h3>
                </div>
                <div class="col-md-6 col-12">
                    {{-- sweetalert --}}
                    <div class="flash-data" data-flashdata="{{ session()->has('pesan') }}"></div>
                    {{-- card form --}}
                    <div class="card my-5">
                        <div class="card-body">
                            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <h3 class="text-center my-3" style="font-family: 'Times New Roman', Times, serif; color:peru">Isi Biodatamu disini ..</h3>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" class="custom-select @error('nama') is-invalid @enderror" placeholder="Nama" autocomplete="off" value="{{ old('nama') }}">
                                            @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="custom-select @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kecamatan_id">Kecamatan</label>
                                            <select class="custom-select @error('kecamatan') is-invalid @enderror" name="kecamatan_id" id="kecamatan_id">
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}" {{ old('kecamatan_id') == $item->kecamatan ? 'selected' : '' }}>
                                                        {{ $item->kecamatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kecamatan_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kota_id">Kota</label>
                                            <select class="custom-select @error('kota') is-invalid @enderror" name="kota_id" id="kota_id">
                                                @foreach ($kota as $item)
                                                    <option value="{{ $item->id }}" {{ old('kota_id') == $item->kota ? 'selected' : '' }}>
                                                        {{ $item->kota }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kota_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="custom-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki
                                                </option>
                                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="jenis_kelamin">Agama</label>
                                        <select class="custom-select @error('agama') is-invalid @enderror" name="agama" id="agama">
                                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>
                                                Islam
                                            </option>
                                            <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>
                                                Kristen
                                            </option>
                                            <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>
                                                Budha
                                            </option>
                                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>
                                                Hindu
                                            </option>
                                            <option value="Khong Hu Cu" {{ old('agama') == 'Khong Hu Cu' ? 'selected' : '' }}>
                                                Khong Hu Cu
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ijazah">IJAZAH</label>
                                            <input type="file" class="custom-select" id="ijazah" name="ijazah" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="skhun">SKHUN</label>
                                            <input type="file" class="custom-select" id="skhun" name="skhun" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                {{-- End card form --}}
            </div>
        </div>
    </div>
</section>
{{-- End jumbotron --}}
@endsection