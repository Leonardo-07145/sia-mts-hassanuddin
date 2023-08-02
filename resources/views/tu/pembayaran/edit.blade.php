@extends('tu.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Edit Data Pembayaran</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Data Pembayaran</a></div>
            <div class="breadcrumb-item">Edit Data Pembayaran</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="siswa" class="form-label">Siswa :</label>
                                        <select class="form-control" name="siswa_id" id="siswa">
                                            @foreach ($siswa as $siswaa)
                                                @if (old('siswa_id', $pembayaran->siswa_id) == $siswaa->id)
                                                    <option value="{{ $siswaa->id }}" selected>{{ $siswaa->nama }}</option>        
                                                @else
                                                    <option value="{{ $siswaa->id }}">{{ $siswaa->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenispembayaran" class="form-label">Jenis Pembayaran :</label>
                                        <select class="form-control" name="jenispembayaran_id" id="jenispembayaran">
                                            @foreach ($jenispembayaran as $jenispembayarann)
                                                @if (old('jenispembayaran_id', $pembayaran->jenispembayaran_id) == $jenispembayarann->id)
                                                    <option value="{{ $jenispembayarann->id }}" selected>{{ $jenispembayarann->nama }}</option>        
                                                @else
                                                    <option value="{{ $jenispembayarann->id }}">{{ $jenispembayarann->nama }}</option>        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tgl_pembayaran" class="form-label">Tanggal Pembayaran :</label>
                                        <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran" required value="{{ old('tgl_pembayaran', $pembayaran->tgl_pembayaran) }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenistahunajaran" class="form-label">Tahun Ajaran :</label>
                                        <select class="form-control" name="jenistahunajaran_id" id="jenistahunajaran">
                                            @foreach ($jenistahunajaran as $jenistahunajarann)
                                                @if (old('jenistahunajaran_id', $pembayaran->jenistahunajaran_id) == $jenistahunajarann->id)
                                                    <option value="{{ $jenistahunajarann->id }}" selected>{{ $jenistahunajarann->nama }}</option>        
                                                @else
                                                    <option value="{{ $jenistahunajarann->id }}">{{ $jenistahunajarann->nama }}</option>        
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