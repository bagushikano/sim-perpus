@extends('/layout/layout')
@push('duar')

@endpush
        @section('content')
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <h1 class="h3 mb-2 text-gray-800">Tambah pinjaman baru</h1>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data pinjaman</h6>
                                </div>
                                <div class="card-body">
                                    <h1 class="h5 mb-2 text-gray-800">Data peminjam</h1>
                                    <div>
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="peminjam">Peminjam</label>
                                                    </div>
                                                    <select disabled class="custom-select" id="peminjam" name="peminjam">
                                                        <option value="">{{ $peminjam->nama }} [ {{ $peminjam->noinduk }} ]</option>
                                                    </select>
                                                </div>

                                                <h1 class="h5 mt-4 mb-2 text-gray-800">Data buku yang di pinjam</h1>
                                                @foreach ($detailPinjam as $detailPinjams )
                                                    <div class="input-group mt-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="buku_1">Buku {{ $loop->iteration }}</label>
                                                        </div>
                                                        <select disabled class="custom-select" id="buku_1" name="buku_1">
                                                            <option value="" hidden> {{ $buku->where('id', $satuanBuku->where('id', $detailPinjams->id_satuan_buku)->first()->id_buku)->first()->nama_buku }} [ {{ $buku->where('id', $satuanBuku->where('id', $detailPinjams->id_satuan_buku)->first()->id_buku)->first()->penerbit->nama_penerbit }} ]</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mt-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="satuan_buku_1">Satuan buku {{ $loop->iteration }}</label>
                                                        </div>
                                                        <select disabled class="custom-select" id="satuan_buku_1" name="satuan_buku_1">
                                                            @if ($satuanBuku->where('id', $detailPinjams->id_satuan_buku)->first()->kondisi == 1)
                                                            <option value="" hidden>Satuan buku {{ $detailPinjams->id_satuan_buku }} [ Bagus ]</option>
                                                            @else
                                                            <option value="" hidden>Satuan buku {{ $detailPinjams->id_satuan_buku }} [ Rusak ]</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                @endforeach
                                                <h1 class="h5 mt-4 mb-2 text-gray-800">Lama pinjaman</h1>
                                                <div class="form-row mb-3">
                                                    <div class="col">
                                                        <label for="date_start">Mulai dari</label>
                                                        <input disabled value={{ $pinjam->date_start }} type="date" class="form-control" name="date_start" id="date_start" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="date_end">Hingga</label>
                                                        <input disabled value={{ $pinjam->date_end }} type="date" class="form-control" name="date_end" id="date_end" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengembalian buku</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="{{ route('pinjam-delete', $pinjam->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-row mb-3">
                                                    <div class="col">
                                                        <label for="date_returned">Tanggal pengembalian</label>
                                                        <input disabled value={{ $pinjam->returned_date }} type="date" class="form-control" name="date_returned" id="date_returned" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="denda">Denda</label>
                                                        @if ( $pinjam->denda == 0 || $pinjam->denda == null )
                                                        <input disabled value="-" type="number" class="form-control" name="denda" id="denda" required>
                                                        @else
                                                        <input disabled value={{ $pinjam->denda }} type="number" class="form-control" name="denda" id="denda" required>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus data</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            @endsection
            <!-- End of Main Content -->
@push('anjay')
    <script>
        $(document).ready(function(){
            $('#pinjam').addClass('active');
        });
    </script>

    <script>

    </script>

    @if((session('failed')))
        <script>
            $(document).ready(function(){
                alertFail('Data gagal di hapus')
            });
        </script>
    @endif
@endpush
