@extends('kepala_sekolah.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Show Data Guru</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Form</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama" class="form-label">Nama Lengkap :</label>
                                        <input type="text" class="form-control-plaintext" readonly="" value="{{ old('nama', $guru->nama) }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nuptk" class="form-label">NUPTK :</label>
                                        <input type="text" class="form-control-plaintext" readonly="" value="{{ old('nuptk', $guru->nuptk) }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tgl_lahir" class="form-label">Tanggal Lahir :</label>
                                        <input type="text" class="form-control-plaintext" readonly="" value="{{ old('tgl_lahir', $guru->tgl_lahir) }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_telp" class="form-label">No Telepon :</label>
                                        <input type="text" class="form-control-plaintext" readonly="" value="{{ old('no_telp', $guru->no_telp) }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="gender" class="form-label">Kelamin :</label>
                                        <input type="text" class="form-control-plaintext" readonly="" value="{{ old('no_telp', $guru->gender->nama) }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pendidikan" class="form-label">Pendidikan Terakhir :</label>
                                        <input type="text" class="form-control-plaintext" readonly="" value="{{ old('no_telp', $guru->pendidikan->nama) }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="alamat" class="form-label">Alamat :</label>
                                        <input type="text" class="form-control-plaintext" readonly="" value="{{ old('no_telp', $guru->alamat) }}">
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
@endsection