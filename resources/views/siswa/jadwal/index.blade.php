@extends('siswa.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Data Jadwal Kelas 
                @foreach ($siswa as $siswaa)
                    {{ $siswaa->kelas->nama }}
                @endforeach
            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Data Jadwal</div>
              </div>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  <i class="far fa-lightbulb"></i> {{ session('success') }}
                </div>
            </div>
        @endif

        {{-- <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <i class="fas fa-user-tie"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h6>Guru</h6>
                </div>
                <div class="card-body">
                    {{ $guru->count() }}
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h6>Siswa</h6>
                </div>
                <div class="card-body">
                    {{ $siswa->count() }}
                </div>
                </div>
            </div>
            </div> 
        </div> --}}

        <div class="row">
            <div class="col-lg-12 col-md-6 col-12 col-sm-12">
            <div class="card">
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Jam Mulai</th>
                        <th>Jam Berakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $jadwall)
                       <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $jadwall->hari->nama }}
                        </td>
                        <td>
                            {{ $jadwall->guru->nama }}
                        </td>
                        <td>
                            {{ $jadwall->mapel->nama }}
                        </td>
                        <td>
                            {{ $jadwall->jam_mulai }}
                        </td>
                        <td>
                            {{ $jadwall->jam_berakhir }}
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
@endsection