@extends('kesiswaan.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Data Penjadwalan Kelas
                @foreach ($kelas as $kelass)
                    {{ $kelass->nama }}
                @endforeach
            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Data Pembayaran</div>
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
                        <th>Aksi</th>
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
                        <td>
                            <a href="{{ route('jadwal.edit', $jadwall->id) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('jadwal.destroy', $jadwall->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Apakah Anda Yakin?')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
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