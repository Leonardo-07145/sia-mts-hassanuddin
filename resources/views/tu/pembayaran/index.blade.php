@extends('tu.layout.main')

@section('container')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Data Pembayaran</h1>
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="float-left">
                    <div class="card-header-action">
                        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data Pembayaran</a>
                    </div>
                  </div>
                  <div class="float-right">
                    <form action="{{ route('pembayaran.index') }}" method="GET">
                      <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search" autocomplete="off">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Tahun Ajaran</th>
                        <th>Tanggal</th>
                        <th>Pembayaran</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $bayar)
                       <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $bayar->siswa->nama }}
                        </td>
                        <td>
                            {{ $bayar->jenistahunajaran->nama }}
                        </td>
                        <td>
                            {{ $bayar->tgl_pembayaran }}
                        </td>
                        <td>
                            {{ $bayar->jenispembayaran->nama }}
                        </td>
                        <td>
                            Rp {{ $bayar->jenispembayaran->harga }}
                        </td>
                        <td class="text-center">
                            {{-- <a href="{{ route('pembayaran.show', $bayar->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a> --}}
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
                  {{-- <div class="float-right">
                    <nav>
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div> --}}
                </div>
              </div>
            </div>
        </div>
        </section>
    </div>
@endsection