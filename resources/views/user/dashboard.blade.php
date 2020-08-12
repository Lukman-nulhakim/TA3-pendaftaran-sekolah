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
        #myTable{
            font-family: Verdana, Geneva, Tahoma, sans-serif
        }
    </style>
@endsection
@section('js')
    <script>
        // each > untuk melooping sesuatu,
        // innerText > untuk mengambil value pada sebuah element
        // this > ini adalah hasil dari ngambil element tersebut
        // innerHTML > untuk menyisipin tag html
        // innerText > untuk menyisipin text doang tanpa tag
        $('td').each(function() {
            if (this.innerText == '') {
                this.innerHTML = '<span class="badge badge-danger">Sedang Direkomendasikan</span>'
            }
        });
    </script>
@endsection


@section('content')

<section class="pelangi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <hr style="border-bottom: 2px solid rgb(238, 116, 16)">
                <h4 class="text-white text-center">Datanglah Dan Bawa Dokumen Lengkap Mu Ke Sekolah Yang Sudah Kami Rekomendasikan ..</h4>
                <hr style="border-bottom: 2px solid rgb(238, 116, 16)">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{-- table --}}
                <table id="myTable" class="display nowrap table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Rekomendasi Sekolah</th>
                            <th scope="col">Alamat Sekolah</th>
                            <th scope="col">Status Sekolah</th>
                            <th scope="col">Email Sekolah</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->kecamatan->kecamatan }}</td>
                                <td>{{ $item->kota->kota }}</td>
                                <td>
                                    @foreach ($item->sekolah as $sekolah_siswa)
                                    <span class="badge badge-primary">{{ $sekolah_siswa->nama_sekolah }}</span><br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->sekolah as $sekolah_siswa)
                                    <span class="badge badge-success">{{ $sekolah_siswa->alamat_sekolah }}</span><br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->sekolah as $sekolah_siswa)
                                    <span class="badge badge-warning">{{ $sekolah_siswa->status }}</span><br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->sekolah as $sekolah_siswa)
                                    <span class="badge badge-dark">{{ $sekolah_siswa->email }}</span><br>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                        <td colspan="9" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
                {{-- End table --}}
            </div>
        </div>
    </div>
</section>


@endsection