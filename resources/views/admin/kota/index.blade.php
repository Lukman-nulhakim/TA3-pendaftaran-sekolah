@extends('admin.master')
@section('title','SchoolSis')
@section('kota','active')
@section('content')

{{-- contnet-wrapper --}}
<div class="content-wrapper">
    {{-- container --}}
    <div class="container-fluid">
        <div class="card bg-secondary mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        
                        <h2 class="text-white"><i class="nav-icon fa fa-building" aria-hidden="true"></i> Kota</h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_kota">
                            <i class="fas fa-plus"></i> Add Kota
                        </button>
                    </div>
                    {{-- sweetalert --}}
                    <div class="flash-data" data-flashdata="{{ session()->has('pesan') }}"></div>
                </div>
            </div>
        </div>
        

        <!-- Modal Create-->
        <div class="modal fade" id="create_kota" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Kota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('kotas.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="kota">Nama Kota</label>
                                        <select class="custom-select  @error('kota') is-invalid @enderror" name="kota" id="kota">
                                            <option value="Tangerang" {{ old('kota') == 'Tangerang' ? 'selected' : ''}}>
                                                Tangerang
                                            </option>
                                            <option value="Jakarta" {{ old('kota') == 'Jakarta' ? 'selected' : ''}}>
                                                Jakarta
                                            </option>
                                            <option value="Bogor" {{ old('kota') == 'Bogor' ? 'selected' : ''}}>
                                                Bogor
                                            </option>
                                            <option value="Depok" {{ old('kota') == 'Depok' ? 'selected' : ''}}>
                                                Depok
                                            </option>
                                            <option value="Bekasi" {{ old('kota') == 'Bekasi' ? 'selected' : ''}}>
                                                Bekasi
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
                                    <th scope="col">Nama Kota</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($kota as $item)
                                    <tr>
                                        <td><h4><span class="badge badge-dark">{{ $loop->iteration }}</span></h4></td>
                                        <td><h4><span class="badge badge-success">{{ $item->kota }}</span></h4></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- Button trigger modal edit -->
                                                <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                                data-target="#edit_kota{{ $loop->iteration }}">
                                                <i class="fa-1x fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('kotas.destroy', ['kota' => $item->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fa-1x fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="edit_kota{{ $loop->iteration }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Kota</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('kotas.update', $item->id) }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="kota">Nama Kota</label>
                                                                    <select class="custom-select  @error('kota') is-invalid @enderror" name="kota" id="kota">
                                                                        <option value="Tangerang" {{ (old('kota') ?? $item->kota ) == 'Tangerang' ? 'selected' : ''}}>
                                                                            Tangerang
                                                                        </option>
                                                                        <option value="Jakarta" {{ (old('kota') ?? $item->kota ) == 'Jakarta' ? 'selected' : ''}}>
                                                                            Jakarta
                                                                        </option>
                                                                        <option value="Bogor" {{ (old('kota') ?? $item->kota ) == 'Bogor' ? 'selected' : ''}}>
                                                                            Bogor
                                                                        </option>
                                                                        <option value="Depok" {{ (old('kota') ?? $item->kota ) == 'Depok' ? 'selected' : ''}}>
                                                                            Depok
                                                                        </option>
                                                                        <option value="Bekasi" {{ (old('kota') ?? $item->kota ) == 'Bekasi' ? 'selected' : ''}}>
                                                                            Bekasi
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