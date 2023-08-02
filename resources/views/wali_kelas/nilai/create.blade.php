@extends('wali_kelas.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Tambah Data Nilai</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Data Nilai</a></div>
            <div class="breadcrumb-item">Tambah Data Nilai</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="{{ route('nilai.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="siswa" class="form-label">Nama Siswa :</label>
                                        <select class="form-control" name="siswa_id" id="siswa">
                                            @foreach ($siswa as $siswaa)
                                                @if (old('siswa_id') == $siswaa->id)
                                                    <option value="{{ $siswaa->id }}" selected>{{ $siswaa->nama }}</option>        
                                                @else
                                                    <option value="{{ $siswaa->id }}">{{ $siswaa->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control @error('mapel_id') is-invalid @enderror" id="mapel_id" name="mapel_id" required autofocus value="{{ $mapel->id }}">
                                        @error('mapel_id')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="tugas1" class="form-label">Nilai Tugas 1 :</label>
                                        <input type="text" class="form-control @error('tugas1') is-invalid @enderror" id="tugas1" name="tugas1" autofocus autocomplete="off" value="{{ old('tugas1') }}" placeholder="Tugas 1">
                                        @error('tugas1')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tugas2" class="form-label">Nilai Tugas 2 :</label>
                                        <input type="text" class="form-control @error('tugas2') is-invalid @enderror" id="tugas2" name="tugas2" placeholder="Tugas 2" value="{{ old('tugas2') }}">
                                        @error('tugas2')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="harian1" class="form-label">Nilai Ulangan 1 :</label>
                                        <input type="text" class="form-control @error('harian1') is-invalid @enderror" id="harian1" name="harian1" placeholder="Ulangan 1" value="{{ old('harian1') }}">
                                        @error('harian1')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="harian2" class="form-label">Nilai Ulangan 2 :</label>
                                        <input type="text" class="form-control @error('harian2') is-invalid @enderror" id="harian2" name="harian2" autofocus autocomplete="off" value="{{ old('harian2') }}" placeholder="Ulangan 2">
                                        @error('harian2')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="uts" class="form-label">UTS :</label>
                                        <input type="text" class="form-control @error('uts') is-invalid @enderror" id="uts" name="uts" placeholder="UTS" value="{{ old('uts') }}">
                                        @error('uts')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="uas" class="form-label">UAS :</label>
                                        <input type="text" class="form-control @error('uas') is-invalid @enderror" id="uas" name="uas" placeholder="UAS" value="{{ old('uas') }}">
                                        @error('uas')
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