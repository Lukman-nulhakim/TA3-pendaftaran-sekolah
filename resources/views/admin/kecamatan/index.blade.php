@extends('admin.master')
@section('title','SchoolSis')
@section('kecamatan','active')
@section('content')

{{-- contnet-wrapper --}}
<div class="content-wrapper">
    {{-- container --}}
    <div class="container-fluid">
        <div class="card bg-secondary mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        
                        <h2 class="text-white"><i class="nav-icon fas fa-university" aria-hidden="true"></i> Kecamatan</h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <!-- Button trigger modal create -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_kecamatan">
                            <i class="fas fa-plus"></i> Add Kecamatan
                        </button>
                    </div>
                    {{-- sweetalert --}}
                    <div class="flash-data" data-flashdata="{{ session()->has('pesan') }}"></div>
                </div>
            </div>
        </div>
        

        <!-- Modal Create-->
        <div class="modal fade" id="create_kecamatan" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Kecamatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('kecamatans.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="kecamatan">Nama Kecamatan</label>
                                        <select class="custom-select  @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                            <option value="Batuceper" {{ old('kecamatan') == 'Batuceper' ? 'selected' : ''}}>
                                                Batuceper
                                            </option>
                                            <option value="Benda" {{ old('kecamatan') == 'Benda' ? 'selected' : ''}}>
                                                Benda
                                            </option>
                                            <option value="Cibodas" {{ old('kecamatan') == 'Cibodas' ? 'selected' : ''}}>
                                                Cibodas
                                            </option>
                                            <option value="Ciledug" {{ old('kecamatan') == 'Ciledug' ? 'selected' : ''}}>
                                                Ciledug
                                            </option>
                                            <option value="Cipondoh" {{ old('kecamatan') == 'Cipondoh' ? 'selected' : ''}}>
                                                Cipondoh
                                            </option>
                                            <option value="Jatiuwung" {{ old('kecamatan') == 'Jatiuwung' ? 'selected' : ''}}>
                                                Jatiuwung
                                            </option>
                                            <option value="Karang Tengah" {{ old('kecamatan') == 'Karang Tengah' ? 'selected' : ''}}>
                                                Karang Tengah
                                            </option>
                                            <option value="Karawaci" {{ old('kecamatan') == 'Karawaci' ? 'selected' : ''}}>
                                                Karawaci
                                            </option>
                                            <option value="Larangan" {{ old('kecamatan') == 'Larangan' ? 'selected' : ''}}>
                                                Larangan
                                            </option>
                                            <option value="Neglasari" {{ old('kecamatan') == 'Neglasari' ? 'selected' : ''}}>
                                                Neglasari
                                            </option>
                                            <option value="Priuk" {{ old('kecamatan') == 'Priuk' ? 'selected' : ''}}>
                                                Priuk
                                            </option>
                                            <option value="Pinang" {{ old('kecamatan') == 'Pinang' ? 'selected' : ''}}>
                                                Pinang
                                            </option>
                                            <option value="Teluknaga" {{ old('kecamatan') == 'Teluknaga' ? 'selected' : ''}}>
                                                Teluknaga
                                            </option>
                                            <option value="Sepatan Timur" {{ old('kecamatan') == 'Sepatan Timur' ? 'selected' : ''}}>
                                                Sepatan Timur
                                            </option>
                                        </select>
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
                    <div class="col-12 col-lg-12">
                        <table class="table table-hover table-primary">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($kecamatans as $kecamatan)
                                    <tr>
                                        <td><h4><span class="badge badge-dark">{{ $loop->iteration }}</span></h4></td>
                                        <td><h4><span class="badge badge-success">{{ $kecamatan->kecamatan }}</span></h4></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- Button trigger modal edit -->
                                                <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                                data-target="#edit_kecamatan{{ $loop->iteration }}">
                                                <i class="fa-1x fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('kecamatans.destroy', ['kecamatan' => $kecamatan->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fa-1x fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="edit_kecamatan{{ $loop->iteration }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Kecamatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('kecamatans.update', $kecamatan->id) }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="kecamatan">Nama Kecamatan</label>
                                                                    <select class="custom-select @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                                                        <option value="Batuceper" {{ (old('kecamatan') ?? $kecamatan->kecamatan )== 'Batuceper' ? 'selected' : ''}}>
                                                                            Batuceper
                                                                        </option>
                                                                        <option value="Benda" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Benda' ? 'selected' : ''}}>
                                                                            Benda
                                                                        </option>
                                                                        <option value="Cibodas" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Cibodas' ? 'selected' : ''}}>
                                                                            Cibodas
                                                                        </option>
                                                                        <option value="Ciledug" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Ciledug' ? 'selected' : ''}}>
                                                                            Ciledug
                                                                        </option>
                                                                        <option value="Cipondoh" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Cipondoh' ? 'selected' : ''}}>
                                                                            Cipondoh
                                                                        </option>
                                                                        <option value="Jatiuwung" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Jatiuwung' ? 'selected' : ''}}>
                                                                            Jatiuwung
                                                                        </option>
                                                                        <option value="Karang Tengah" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Karang Tengah' ? 'selected' : ''}}>
                                                                            Karang Tengah
                                                                        </option>
                                                                        <option value="Karawaci" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Karawaci' ? 'selected' : ''}}>
                                                                            Karawaci
                                                                        </option>
                                                                        <option value="Larangan" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Larangan' ? 'selected' : ''}}>
                                                                            Larangan
                                                                        </option>
                                                                        <option value="Neglasari" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Neglasari' ? 'selected' : ''}}>
                                                                            Neglasari
                                                                        </option>
                                                                        <option value="Priuk" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Priuk' ? 'selected' : ''}}>
                                                                            Priuk
                                                                        </option>
                                                                        <option value="Pinang" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Pinang' ? 'selected' : ''}}>
                                                                            Pinang
                                                                        </option>
                                                                        <option value="Teluknaga" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Teluknaga' ? 'selected' : ''}}>
                                                                            Teluknaga
                                                                        </option>
                                                                        <option value="Sepatan Timur" {{ (old('kecamatan') ?? $kecamatan->kecamatan ) == 'Sepatan Timur' ? 'selected' : ''}}>
                                                                            Sepatan Timur
                                                                        </option>
                                                                    </select>
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
                                <td colspan="4" class="text-center">Data Kosong</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- endtable --}}
        
    </div>
    {{-- end-container --}}
</div>
{{-- end-content-wrapper --}}

@endsection