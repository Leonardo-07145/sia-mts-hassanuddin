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
            <div class="col-lg-12 col-md-6 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                <div class="card-header-action">
                    <a href="/tgl_presensi/create/{id}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Tanggal Presensi</a>
                </div>
                </div>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="tabel1">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                        <td>
                            1
                        </td>
                        <td contenteditable="true" class="nama">
                            <select class="form-control" name="siswa_id" id="siswa">
                                @foreach ($siswa as $siswaa)
                                    @if (old('siswa_id') == $siswaa->id)
                                        <option value="{{ $siswaa->id }}" selected>{{ $siswaa->nama }}</option>        
                                    @else
                                        <option value="{{ $siswaa->id }}">{{ $siswaa->nama }}</option>        
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td contenteditable="true" class="keterangan">
                            <select class="form-control" name="jenispresensi_id" id="jenispresensi">
                                @foreach ($jenispresensi as $jenispresensii)
                                    @if (old('jenispresensi_id') == $jenispresensii->id)
                                        <option value="{{ $jenispresensii->id }}" selected>{{ $jenispresensii->nama }}</option>        
                                    @else
                                        <option value="{{ $jenispresensii->id }}">{{ $jenispresensii->nama }}</option>        
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-action" id="hapus" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        </tr>
                    </tbody>
                    </table>
                    <button class="btn btn-success btn-action" id="tambah" title="Tambah">+</button>
                    <button class="btn btn-primary btn-action" id="simpan" title="Simpan">simpan</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
@endsection