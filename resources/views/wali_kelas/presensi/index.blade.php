@extends('wali_kelas.layout.main')

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

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h6>Kelas</h6>
                </div>
                <div class="card-body">
                        {{ $kelas->kelas->nama }}
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
        </div>

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="float-left">
                    <div class="card-header-action">
                        <a href="/tgl_presensi/create/{id}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Tanggal Presensi</a>
                    </div>
                  </div>
                  <div class="float-right">
                    <form action="{{ route('presensi.index') }}" method="GET">
                      <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search" autocomplete="off">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tgl_presensi as $tgl_presensii)
                       <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $tgl_presensii->tgl_presensi }}
                        </td>
                        <td>
                            <a href="/presensi/show/{{ $tgl_presensii->id }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Lihat Data Presensi"><i class="fas fa-eye"></i></a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                  {{-- <div class="float-right">
                    <nav>
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div> --}}
                </div>
              </div>
            </div>
        </div>
        </section>
    </div>
@endsection