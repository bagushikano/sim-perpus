@extends('/layout/layout')
@push('duar')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
        @section('content')
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <h1 class="h3 mb-2 text-gray-800">Edit buku</h1>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data buku</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="{{ route('buku-update', $buku->id) }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="nama_buku">Nama buku</label>
                                                        <input value="{{ $buku->nama_buku }}" type="text" class="form-control" name="nama_buku" id="nama_buku" placeholder="Contoh: Buku cerita anak (Maksimal 400 karakter)" required>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <div class="col">
                                                        <label for="isbn">ISBN buku</label>
                                                        <input value="{{ $buku->isbn }}" type="text" class="form-control" name="isbn" id="isbn" placeholder="Contoh: 123-4-56-148410-0" required>
                                                    </div>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="penerbit">Penerbit buku</label>
                                                    </div>
                                                    <select class="custom-select" id="penerbit" name="penerbit">
                                                        <option hidden>Pilih penerbit buku</option>
                                                        @foreach ($penerbit as $penerbits)
                                                            @if ($penerbits->id == $buku->id_penerbit)
                                                            <option selected value={{ $penerbits->id }}>{{ $penerbits->nama_penerbit}}</option>
                                                            @else
                                                            <option value={{ $penerbits->id }}>{{ $penerbits->nama_penerbit}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Simpan data</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit satuan buku</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="{{ route('satuan-buku-update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="satuan_update">Satuan buku</label>
                                                    </div>
                                                    <select class="custom-select" id="satuan_update" name="satuan_update">
                                                        @if ($satuanBuku->count() < 1)
                                                        <option value="" hidden>Tidak ada satuan buku, tambahkan satuan buku terlebih dahulu</option>
                                                        @endif
                                                        <option value="" hidden>Pilih satuan buku</option>
                                                        @foreach ($satuanBuku as $satuanBukus)
                                                            @if($satuanBukus->kondisi == 0)
                                                            <option value={{ $satuanBukus->id }}>Id satuan buku {{ $satuanBukus->id}} (Kondisi rusak)</option>
                                                            @else
                                                            <option value={{ $satuanBukus->id }}>Id satuan buku {{ $satuanBukus->id}} (Kondisi bagus)</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="kondisi">Kondisi buku</label>
                                                    </div>
                                                    <select class="custom-select" id="kondisi" name="kondisi">
                                                        <option value="" hidden>Pilih kondisi buku</option>
                                                        <option value=0>Rusak</option>
                                                        <option value=1>Bagus</option>
                                                    </select>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="pinjam">Ketersediaan buku untuk di pinjam</label>
                                                    </div>
                                                    <select class="custom-select" id="pinjam" name="pinjam">
                                                        <option value="" hidden>Pilih ketersediaan buku untuk di pinjam</option>
                                                        <option value=0>Tidak tersedia</option>
                                                        <option value=1>Tersedia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Simpan data</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah satuan buku</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="{{ route('satuan-buku-add', $buku->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="nama_buku">Berapa banyak?</label>
                                                        <input type="number" min="0" class="form-control" name="tambah_satuan" id="tambah_satuan" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text">Tambah satuan buku</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Hapus satuan buku</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="{{ route('satuan-buku-delete')}}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="satuan_delete">Satuan buku</label>
                                                    </div>
                                                    <select class="custom-select" id="satuan_delete" name="satuan_delete">
                                                        @if ($satuanBuku->count() < 1)
                                                        <option value="" hidden>Tidak ada satuan buku, tambahkan satuan buku terlebih dahulu</option>
                                                        @endif
                                                        <option value="" hidden>Pilih satuan buku</option>
                                                        @foreach ($satuanBuku as $satuanBukus)
                                                            @if($satuanBukus->kondisi == 0)
                                                            <option value={{ $satuanBukus->id }}>Id satuan buku {{ $satuanBukus->id}} [Kondisi rusak]</option>
                                                            @else
                                                            <option value={{ $satuanBukus->id }}>Id satuan buku {{ $satuanBukus->id}} [Kondisi bagus]</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-danger btn-icon-split" id="satuan_delete">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus satuan buku</span>
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
            $('#buku').addClass('active');
            $('#satuan_delete').on('change', function() {
                $('#satuan_delete').removeAttr('hidden');
            });
        });
    </script>

    @if((session('done')))
    <script>
        $(document).ready(function(){
            alertDone('Data buku berhasil di edit')
        });
    </script>
    @endif

    @if((session('failed')))
        <script>
            $(document).ready(function(){
                alertFail('Data buku gagal di edit')
            });
        </script>
    @endif

    @if((session('done-delete-satuan')))
    <script>
        $(document).ready(function(){
            alertDone('Data satuan buku berhasil di hapus')
        });
    </script>
    @endif

    @if((session('failed-delete-satuan')))
        <script>
            $(document).ready(function(){
                alertFail('Data satuan buku gagal di hapus')
            });
        </script>
    @endif

    @if((session('done-add-satuan')))
    <script>
        $(document).ready(function(){
            alertDone('Data satuan buku berhasil di tambah')
        });
    </script>
    @endif

    @if((session('failed-add-satuan')))
        <script>
            $(document).ready(function(){
                alertFail('Data satuan buku gagal di tambah')
            });
        </script>
    @endif

    @if((session('done-update-satuan')))
    <script>
        $(document).ready(function(){
            alertDone('Data satuan buku berhasil di edit')
        });
    </script>
    @endif

    @if((session('failed-update-satuan')))
        <script>
            $(document).ready(function(){
                alertFail('Data satuan buku gagal di edit')
            });
        </script>
    @endif
@endpush
