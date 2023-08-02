@extends('kesiswaan.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Edit Penjadwalan Kelas
            </h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Data Penjadwalan</a></div>
            <div class="breadcrumb-item">Edit Data Penjadwalan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="hari" class="form-label">Hari :</label>
                                        <select class="form-control" name="hari_id" id="hari">
                                            @foreach ($hari as $harii)
                                                @if (old('hari_id', $jadwal->hari_id) == $harii->id)
                                                    <option value="{{ $harii->id }}" selected>{{ $harii->nama }}</option>        
                                                @else
                                                    <option value="{{ $harii->id }}">{{ $harii->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="guru" class="form-label">Guru :</label>
                                        <select class="form-control" name="guru_id" id="guru">
                                            @foreach ($guru as $guruu)
                                                @if (old('guru_id', $jadwal->guru_id) == $guruu->id)
                                                    <option value="{{ $guruu->id }}" selected>{{ $guruu->nama }}</option>        
                                                @else
                                                    <option value="{{ $guruu->id }}">{{ $guruu->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="mapel" class="form-label">Mata Pelajaran :</label>
                                        <select class="form-control" name="mapel_id" id="mapel">
                                            @foreach ($mapel as $mapell)
                                                @if (old('mapel_id', $jadwal->mapel_id) == $mapell->id)
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
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" required autofocus value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" placeholder="jam_mulai">
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jam_berakhir" class="form-label">Jam Berakhir :</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" id="jam_berakhir" name="jam_berakhir" required autofocus value="{{ old('jam_berakhir', $jadwal->jam_berakhir) }}" placeholder="jam_berakhir">
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
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