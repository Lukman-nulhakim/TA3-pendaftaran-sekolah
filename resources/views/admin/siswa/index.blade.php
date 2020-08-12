@extends('admin.master')
@section('title','SchoolSis')
@section('siswa','active')
@section('css')
    <style>
        /* @media (max-width: 575.98px) {
            table{
                width: 400px;
                height: 400px;
            }
        } */
    </style>
@endsection
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card bg-secondary mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="text-white"><i class="nav-icon fa fa-users" aria-hidden="true"></i> Siswa/Siswi</h2>
                    </div>
                </div>
            </div>
            {{-- sweetalert --}}
            <div class="flash-data" data-flashdata="{{ session()->has('pesan') }}"></div>
        </div>
        {{-- table --}}
        <div class="table-responsive-sm">
        <table id="myTable" class="display nowrap table table-striped" style="width:100%">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Ijazah</th>
                    <th scope="col">SKHUN</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->tanggal_lahir }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->kecamatan->kecamatan }}</td>
                        <td>{{ $siswa->kota->kota }}</td>
                        <td>{{ $siswa->agama }}</td>
                        <td>
                            <img src="{{ Storage::url($siswa->ijazah) }}" alt="" style="width:50px; height:35px;">
                        </td>
                        <td>
                            <img src="{{ Storage::url($siswa->skhun) }}" alt="" style="width:50px; height:35px;">
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('siswa.show', ['siswa' => $siswa->id]) }}" class="btn btn-primary mr-2"><i class="fas fa-eye"></i></a>
                                <!-- Button trigger modal edit -->
                                <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                data-target="#edit_siswa{{ $loop->iteration }}">
                                <i class="fa-1x fas fa-edit"></i>
                                </button>
                                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa-1x fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit-->
                    <div class="modal fade" id="edit_siswa{{ $loop->iteration }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Kota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" autocomplete="off" value="{{ old('nama') ?? $siswa->nama }}">
                                                    @error('nama')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $siswa->tanggal_lahir }}">
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
                                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat">{{ old('alamat') ?? $siswa->alamat }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="kecamatan_id">Kecamatan</label>
                                                    <select class="form-control" name="kecamatan_id" id="kecamatan_id">
                                                        @foreach ($kecamatan as $tampil)
                                                            <option value="{{ $tampil->id }}" {{ (old('kecamatan_id') ?? $siswa->kecamatan_id ) == $tampil->kecamatan ? 'selected' : '' }}>
                                                                {{ $tampil->kecamatan }}
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
                                                            <option value="{{ $item->id }}" {{ (old('kota_id') ?? $siswa->kota_id ) == $item->kota ? 'selected' : '' }}>
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
                                                        <option value="laki-laki" {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin ) == 'laki-laki' ? 'selected' : '' }}>
                                                            Laki-laki
                                                        </option>
                                                        <option value="perempuan" {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin ) == 'perempuan' ? 'selected' : '' }}>
                                                            Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="jenis_kelamin">Agama</label>
                                                <select class="custom-select @error('agama') is-invalid @enderror" name="agama" id="agama">
                                                    <option value="Islam" {{ (old('agama') ?? $siswa->agama ) == 'Islam' ? 'selected' : '' }}>
                                                        Islam
                                                    </option>
                                                    <option value="Kristen" {{ (old('agama') ?? $siswa->agama ) == 'Kristen' ? 'selected' : '' }}>
                                                        Kristen
                                                    </option>
                                                    <option value="Budha" {{ (old('agama') ?? $siswa->agama ) == 'Budha' ? 'selected' : '' }}>
                                                        Budha
                                                    </option>
                                                    <option value="Hindu" {{ (old('agama') ?? $siswa->agama ) == 'Hindu' ? 'selected' : '' }}>
                                                        Hindu
                                                    </option>
                                                    <option value="Khong Hu Cu" {{ (old('agama') ?? $siswa->agama ) == 'Khong Hu Cu' ? 'selected' : '' }}>
                                                        Khong Hu Cu
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="ijazah">IJAZAH</label>
                                                    <img src="{{ Storage::url($siswa->ijazah) }}" alt="" style="height: 70px">
                                                    <input type="file" class="custom-select" id="ijazah" name="ijazah" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="skhun">SKHUN</label>
                                                    <img src="{{ Storage::url($siswa->skhun) }}" alt="" style="height: 70px">
                                                    <input type="file" class="custom-select" id="skhun" name="skhun" required>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- footer modal --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>      
                    </div>
                    {{-- end Modal Edit --}}
                @empty
                <td colspan="9" class="text-center">Data Kosong</td>
                @endforelse
            </tbody>
        </table>
        </div>
        {{-- End table --}}
    </div>
</div>

@endsection