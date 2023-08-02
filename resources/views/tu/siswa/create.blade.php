@extends('tu.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Tambah Data Siswa</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Data Siswa</a></div>
            <div class="breadcrumb-item">Tambah Data Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama" class="form-label">Nama Lengkap :</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}" placeholder="Nama Lengkap">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nisn" class="form-label">NISN :</label>
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" required placeholder="NISN" value="{{ old('nisn') }}">
                                        @error('nisn')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">                                    
                                    <div class="form-group col-md-6">
                                        <label for="email" class="form-label">Email :</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tgl_lahir" class="form-label">Tanggal Lahir :</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="{{ old('tgl_lahir') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_telp" class="form-label">No Telepon :</label>
                                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" required autofocus value="{{ old('no_telp') }}" placeholder="No Telepon">
                                        @error('no_telp')
                                            <div class="invalid-feedback">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="gender" class="form-label">Kelamin :</label>
                                        <select class="form-control" name="gender_id" id="gender">
                                            @foreach ($gender as $gndr)
                                                @if (old('gender_id') == $gndr->id)
                                                    <option value="{{ $gndr->id }}" selected>{{ $gndr->nama }}</option>        
                                                @else
                                                    <option value="{{ $gndr->id }}">{{ $gndr->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kelas" class="form-label">Kelas :</label>
                                        <select class="form-control" name="kelas_id" id="kelas">
                                            @foreach ($kelas as $klass)
                                                @if (old('kelas_id') == $klass->id)
                                                    <option value="{{ $klass->id }}" selected>{{ $klass->nama }}</option>        
                                                @else
                                                    <option value="{{ $klass->id }}">{{ $klass->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="alamat" class="form-label">Alamat :</label>
                                        <textarea class="form-control" style="height: 100px;" id="alamat" name="alamat" required placeholder="Alamat">{{ old('alamat') }}</textarea>
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