@extends('wali_kelas.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Edit Data Presensi</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('presensi.index') }}">Data Presensi</a></div>
            <div class="breadcrumb-item">Edit Data Presensi</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="{{ route('presensi.update', $presensi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="siswa" class="form-label">Siswa :</label>
                                        <select class="form-control" name="siswa_id" id="siswa">
                                            @foreach ($siswa as $siswaa)
                                                @if (old('siswa_id', $presensi->siswa_id) == $siswaa->id)
                                                    <option value="{{ $siswaa->id }}" selected>{{ $siswaa->nama }}</option>        
                                                @else
                                                    <option value="{{ $siswaa->id }}">{{ $siswaa->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenispresensi" class="form-label">Keterangan :</label>
                                        <select class="form-control" name="jenispresensi_id" id="jenispresensi">
                                            @foreach ($jenispresensi as $jenispresensii)
                                                @if (old('jenispresensi_id', $presensi->jenispresensi_id) == $jenispresensii->id)
                                                    <option value="{{ $jenispresensii->id }}" selected>{{ $jenispresensii->nama }}</option>        
                                                @else
                                                    <option value="{{ $jenispresensii->id }}">{{ $jenispresensii->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
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