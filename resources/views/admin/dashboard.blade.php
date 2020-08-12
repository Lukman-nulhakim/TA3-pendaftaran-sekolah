@extends('admin.master')
@section('title','SchoolSis')
@section('dashboard','active')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="card bg-dark mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="text-white"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dashboard --}}
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $siswa }}</h3>
  
                  <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Siswa</h4></p>
                </div>
                <div class="icon">
                  <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="{{ route('siswa.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $sekolah }}</h3>
  
                  <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Sekolah</h4></p>
                </div>
                <div class="icon">
                  <i class="nav-icon fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
                <a href="{{ route('sekolah.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $kecamatan }}</h3>
  
                  <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Kecamatan</h4></p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-university" aria-hidden="true"></i>
                </div>
                <a href="{{ route('kecamatans.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $kota }}</h3>
  
                  <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Kota</h4></p>
                </div>
                <div class="icon">
                  <i class="nav-icon fa fa-building" aria-hidden="true"></i>
                </div>
                <a href="{{ route('kotas.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
    </div>
</div>
    
@endsection