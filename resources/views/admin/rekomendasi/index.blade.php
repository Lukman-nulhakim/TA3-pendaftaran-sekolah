@extends('admin.master')
@section('title','SchoolSis')
@section('rekomendasi','active')
@section('js')
    <script>
        // each > untuk melooping sesuatu,
        // innerText > untuk mengambil value pada sebuah element
        // this > ini adalah hasil dari ngambil element tersebut
        // innerHTML > untuk menyisipin tag html
        // innerText > untuk menyisipin text doang tanpa tag
        $('td').each(function() {
            if (this.innerText == '') {
                this.innerHTML = '<span class="badge badge-danger">Belum Direkomendasikan</span>'
            }
        });
    </script>
@endsection
@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="card bg-secondary mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="text-white"><i class="nav-icon fas fa-balance-scale"></i> Rekomendasi</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-12 d-flex justify-content-start">
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#rekomendasi">
                            <i class="fas fa-plus"></i> Add Rekomendasi
                        </button>
                    </div>
                </div>
                
                
                <!-- Modal -->
                <div class="modal fade" id="rekomendasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rekomendasi Sekolah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            {{-- inputan --}}
                            <form action="{{ route('rekomendasi.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="siswa_id">Nama Siswa</label>
                                            <select class="custom-select @error('nama') is-invalid @enderror" name="siswa_id" id="siswa_id">
                                                @foreach ($siswa as $item)
                                                    <option value="{{ $item->id }}" {{ old('siswa_id') == $item->nama ? 'selected' : '' }}>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('siswa_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sekolah_id">Rekomendasi Sekolah</label>
                                            <br>
                                            <select class="selectRekomen js-states form-control" name="sekolah[]" id="sekolah_id" multiple="multiple">
                                                @foreach ($sekolah as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }} : {{ $item->min_nilai }}</option>
                                                @endforeach
                                            </select>
                                                @error('sekolah_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- footer button modal --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            {{-- Endinputan --}}
                        </div>
                    </div>
                    </div>
                </div>
                {{-- endModal --}}

                {{-- table --}}
                <table class="table table-striped" id="myTable">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Nama Sekolah</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    @foreach ($item->sekolah as $sekolah_siswa)
                                    <span class="badge badge-warning">{{ $sekolah_siswa->nama_sekolah }}</span>
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
            {{-- endCardBody --}}
        </div>

    </div>
</div>

@endsection