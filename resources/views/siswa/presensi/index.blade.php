@extends('siswa.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Data Presensi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Data Presensi</div>
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
                <div class="card-header">
                </div>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensi as $presensii)
                       <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $presensii->tgl_presensi->tgl_presensi }}
                        </td>
                        <td>
                            <div class="card-body">
                                <div class="badges">
                                    @if ($presensii->jenispresensi->nama == "Masuk")
                                        <span class="badge badge-primary">{{ $presensii->jenispresensi->nama }}</span>                                        
                                    @elseif ($presensii->jenispresensi->nama == "Sakit")
                                        <span class="badge badge-warning">{{ $presensii->jenispresensi->nama }}</span>
                                    @elseif ($presensii->jenispresensi->nama == "Izin")
                                        <span class="badge badge-warning">{{ $presensii->jenispresensi->nama }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $presensii->jenispresensi->nama }}</span>
                                    @endif
                                </div>
                            </div>
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