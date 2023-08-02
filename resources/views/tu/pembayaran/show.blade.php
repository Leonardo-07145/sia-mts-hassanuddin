@extends('tu.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Data Pembayaran
                    {{ $siswa->nama }}
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
                <div class="card-header">
                    <div class="card-header-action">
                            <a href="{{ route('pembayaran.create2',$siswa->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data Pembayaran</a>
                    </div>
                </div>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $bayar)
                       <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $bayar->tgl_pembayaran }}
                        </td>
                        <td>
                            {{ $bayar->deskripsi }}
                        </td>
                        <td>
                            <span class="badge badge-success">{{ $bayar->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('pembayaran.edit', $bayar->id) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('pembayaran.destroy', $bayar->id) }}" method="POST" class="d-inline">
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