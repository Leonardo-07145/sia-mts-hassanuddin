@extends('wali_kelas.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Tambah Tanggal Presensi</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('presensi.index') }}">Data Presensi</a></div>
            <div class="breadcrumb-item">Tambah Data Presensi</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="/tgl_presensi/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tgl_presensi" class="form-label">Tanggal :</label>
                                        <input type="date" class="form-control" id="tgl_presensi" name="tgl_presensi" required value="{{ old('tgl_presensi') }}" autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control @error('walikelas_id') is-invalid @enderror" id="walikelas_id" name="walikelas_id" required autofocus value="{{ $walikelas_id->id }}" placeholder="ID">
                                        @error('walikelas_id')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
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