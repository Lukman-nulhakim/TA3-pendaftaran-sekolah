@extends('admin.master')
@section('title','SchoolSis')
@section('sekolah','active')
@section('content')

{{-- content wrapper --}}
<div class="content-wrapper">
    {{-- Container --}}
    <div class="container-fluid">
        <div class="card bg-secondary mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <h2 class="text-white"><i class="nav-icon fa fa-graduation-cap" aria-hidden="true"></i> Sekolah</h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_sekolah">
                            <i class="fas fa-plus"></i> Add Sekolah
                        </button>
                    </div>
                    {{-- sweetalert --}}
                    <div class="flash-data" data-flashdata="{{ session()->has('pesan') }}"></div>
                </div>
            </div>
        </div>
        {{-- EndCard --}}

        <!-- Modal Create-->
        <div class="modal fade" id="create_sekolah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Sekolah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('sekolah.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama_sekolah">Nama Sekolah</label>
                                        <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" placeholder="Nama sekolah" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}">
                                        @error('nama_sekolah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="custom-select" name="status" id="status">
                                            <option value="Negri" {{ old('status') == 'Negri' ? 'selected' : '' }}>
                                                Negri
                                            </option>
                                            <option value="Swasta" {{ old('status') == 'Swasta' ? 'selected' : '' }}>
                                                Swasta
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="alamat_sekolah">Alamat Sekolah</label>
                                        <textarea class="form-control" placeholder="Alamat sekolah" name="alamat_sekolah" id="alamat_sekolah" rows="3">{{ old('alamat_sekolah') }}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="min_nilai">Min nilai sekolah</label>
                                        <input type="text" class="form-control @error('min_nilai') is-invalid @enderror" placeholder="Nilai standart" id="min_nilai" name="min_nilai" value="{{ old('min_nilai') }}">
                                        @error('min_nilai')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Sekolah</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- footer modal --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>      
        </div>
        {{-- end Modal Create --}}

        {{-- table --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <table class="table table-hover table-primary">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Sekolah</th>
                                            <th scope="col">Alamat Sekolah</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Nilai Standart</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @forelse ($sekolahs as $sekolah)
                                            <tr>
                                                <td><span class="badge badge-dark">{{ $loop->iteration }}</span></td>
                                                <td><span class="badge badge-success">{{ $sekolah->nama_sekolah }}</span></td>
                                                <td><span class="badge badge-secondary">{{ $sekolah->alamat_sekolah }}</span></td>
                                                <td><span class="badge badge-warning">{{ $sekolah->status }}</span></td>
                                                <td><span class="badge badge-danger">{{ $sekolah->min_nilai }}</span></td>
                                                <td><span class="badge badge-light">{{ $sekolah->email }}</span></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <!-- Button trigger modal edit -->
                                                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                                        data-target="#edit_sekolah{{ $loop->iteration }}">
                                                        <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form action="{{ route('sekolah.destroy', ['sekolah' => $sekolah->id]) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="edit_sekolah{{ $loop->iteration }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Kecamatan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('sekolah.update', $sekolah->id) }}" method="POST">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="nama_sekolah">Nama Sekolah</label>
                                                                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" placeholder="Masukan nama sekolah" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') ?? $sekolah->nama_sekolah }}">
                                                                            @error('nama_sekolah')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select class="custom-select" name="status" id="status">
                                                                                <option value="Negri" {{ (old('status') ?? $sekolah->status ) == 'Negri' ? 'selected' : '' }}>
                                                                                    Negri
                                                                                </option>
                                                                                <option value="Swasta" {{ (old('status') ?? $sekolah->status ) == 'Swasta' ? 'selected' : '' }}>
                                                                                    Swasta
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="alamat_sekolah">Alamat Sekolah</label>
                                                                            <textarea class="form-control" placeholder="Masukan alamat sekolah" name="alamat_sekolah" id="alamat_sekolah" rows="3">{{ old('alamat_sekolah') ?? $sekolah->alamat_sekolah }}</textarea>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="min_nilai">Min nilai sekolah</label>
                                                                            <input type="text" class="form-control @error('min_nilai') is-invalid @enderror" placeholder="Masukan nilai standart sekolah" id="min_nilai" name="min_nilai" value="{{ old('min_nilai') ?? $sekolah->min_nilai }}">
                                                                            @error('min_nilai')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="email">Email Sekolah</label>
                                                                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email" id="email" name="email" value="{{ old('email') ?? $sekolah->email }}">
                                                                            @error('email')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- footer modal --}}
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>      
                                            </div>
                                            {{-- end Modal Edit --}}
                                        @empty
                                        <td colspan="8" class="text-center">Data Kosong</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </table>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        {{-- endtable --}}
    </div>
    {{-- EndContainer --}}
</div>
{{-- Endcontent wrapper --}}

@endsection