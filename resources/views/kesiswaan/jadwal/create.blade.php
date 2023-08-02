@extends('kesiswaan.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Tambah Penjadwalan Kelas</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Data Penjadwalan</a></div>
            <div class="breadcrumb-item">Create Data Penjadwalan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="{{ route('jadwal.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kelas" class="form-label">Kelas :</label>
                                        <select class="form-control" name="kelas_id" id="kelas">
                                            @foreach ($kelas as $kelass)
                                                @if (old('guru_id') == $kelass->id)
                                                    <option value="{{ $kelass->id }}" selected>{{ $kelass->nama }}</option>        
                                                @else
                                                    <option value="{{ $kelass->id }}">{{ $kelass->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hari" class="form-label">Hari :</label>
                                        <select class="form-control" name="hari_id" id="hari">
                                            @foreach ($hari as $harii)
                                                @if (old('hari_id') == $harii->id)
                                                    <option value="{{ $harii->id }}" selected>{{ $harii->nama }}</option>        
                                                @else
                                                    <option value="{{ $harii->id }}">{{ $harii->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="guru" class="form-label">Guru :</label>
                                        <select class="form-control" name="guru_id" id="guru">
                                            @foreach ($guru as $guruu)
                                                @if (old('guru_id') == $guruu->id)
                                                    <option value="{{ $guruu->id }}" selected>{{ $guruu->nama }}</option>        
                                                @else
                                                    <option value="{{ $guruu->id }}">{{ $guruu->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mapel" class="form-label">Mata Pelajaran :</label>
                                        <select class="form-control" name="mapel_id" id="mapel">
                                            @foreach ($mapel as $mapell)
                                                @if (old('guru_id') == $mapell->id)
                                                    <option value="{{ $mapell->id }}" selected>{{ $mapell->nama }}</option>        
                                                @else
                                                    <option value="{{ $mapell->id }}">{{ $mapell->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="jam_mulai" class="form-label">Jam Mulai :</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" required autofocus value="{{ old('jam_mulai') }}" placeholder="jam_mulai">
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jam_berakhir" class="form-label">Jam Berakhir :</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" id="jam_berakhir" name="jam_berakhir" required autofocus value="{{ old('jam_berakhir') }}" placeholder="jam_berakhir">
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Create</button>
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