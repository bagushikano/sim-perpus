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
                                        <form method="POST" action="{{ route('pinjam-store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="peminjam">Peminjam</label>
                                                    </div>
                                                    <select class="custom-select" id="peminjam" name="peminjam">
                                                        <option hidden>Pilih peminjam buku</option>
                                                        @foreach ($peminjam as $peminjams)
                                                            <option value={{ $peminjams->id }}>{{ $peminjams->nama}} [ {{ $peminjams->noinduk }} ]</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <h1 class="h5 mt-4 mb-2 text-gray-800">Data buku yang akan di pinjam</h1>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="buku_1">Buku 1</label>
                                                    </div>
                                                    <select class="custom-select" id="buku_1" name="buku_1">
                                                        @if ($buku->count() < 1)
                                                        <option value="" hidden>Tidak ada buku, tambahkan buku terlebih dahulu</option>
                                                        @endif
                                                        <option value="" hidden>Pilih judul buku pertama</option>
                                                        @foreach ($buku as $bukus)
                                                            <option value={{ $bukus->id }}>{{ $bukus->nama_buku}} [{{ $bukus->isbn }}]</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="satuan_buku_1">Satuan buku 1</label>
                                                    </div>
                                                    <select class="custom-select" id="satuan_buku_1" name="satuan_buku_1">
                                                        <option value="" hidden>Pilih satuan buku</option>
                                                    </select>
                                                </div>

                                                <div class="input-group mt-4">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="buku_2">Buku 2</label>
                                                    </div>
                                                    <select class="custom-select" id="buku_2" name="buku_2">
                                                        @if ($buku->count() < 1)
                                                        <option value="" hidden>Tidak ada buku, tambahkan buku terlebih dahulu</option>
                                                        @endif
                                                        <option value="" hidden>Pilih judul buku kedua</option>
                                                        @foreach ($buku as $bukus)
                                                            <option value={{ $bukus->id }}>{{ $bukus->nama_buku}} [{{ $bukus->isbn }}]</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="satuan_buku_2">Satuan buku 2</label>
                                                    </div>
                                                    <select class="custom-select" id="satuan_buku_2" name="satuan_buku_2">
                                                        <option value="" hidden>Pilih satuan buku</option>
                                                    </select>
                                                </div>

                                                <div class="input-group mt-4">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="buku_3">Buku 3</label>
                                                    </div>
                                                    <select class="custom-select" id="buku_3" name="buku_3">
                                                        @if ($buku->count() < 1)
                                                        <option value="" hidden>Tidak ada buku, tambahkan buku terlebih dahulu</option>
                                                        @endif
                                                        <option value="" hidden>Pilih judul buku ketiga</option>
                                                        @foreach ($buku as $bukus)
                                                            <option value={{ $bukus->id }}>{{ $bukus->nama_buku}} [{{ $bukus->isbn }}]</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="satuan_buku_3">Satuan buku 3</label>
                                                    </div>
                                                    <select class="custom-select" id="satuan_buku_3" name="satuan_buku_3">
                                                        <option value="" hidden>Pilih satuan buku</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <h1 class="h5 mt-4 mb-2 text-gray-800">Lama pinjaman</h1>
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="date_start">Mulai dari</label>
                                                    <input value="" type="date" class="form-control" name="date_start" id="date_start" required>
                                                </div>
                                                <div class="col">
                                                    <label for="date_end">Hingga</label>
                                                    <input value="" type="date" class="form-control" name="date_end" id="date_end" required>
                                                </div>
                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text">Tambah pinjaman</span>
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
        $('#buku_1').on('change', function() {
            var formBuku = $('#buku_1').find(":selected").val();
            var satuanBuku = {!! $satuanBuku->toJson() !!}
            var bukuSelected = satuanBuku.filter(satuanBuku=>satuanBuku.id_buku==formBuku);
            $("#satuan_buku_1").find('option').remove();

            if (bukuSelected.length > 0) {
                for (let x in bukuSelected) {
                    if (bukuSelected[x].status_pinjam == 1) {
                        if (bukuSelected[x].kondisi == 0) {
                            $("#satuan_buku_1").append(new Option("Satuan buku " + bukuSelected[x].id + " [Rusak]",  bukuSelected[x].id));
                        }
                        else {
                            $("#satuan_buku_1").append(new Option("Satuan buku " + bukuSelected[x].id + " [Bagus]",  bukuSelected[x].id));
                        }
                    }
                }
            }
            else {
                $('#satuan_buku_1').append(
                    $('<option>', {
                        value     : '',
                        text      : 'Tidak ada buku tersedia',
                        //This here
                        disabled  : 'disabled',
                        selected  : 'selected'
                    })
                );
            }
        });

        $('#buku_2').on('change', function() {
            var formBuku = $('#buku_2').find(":selected").val();
            var satuanBuku = {!! $satuanBuku->toJson() !!}
            var bukuSelected = satuanBuku.filter(satuanBuku=>satuanBuku.id_buku==formBuku);
            $("#satuan_buku_2").find('option').remove();

            if (bukuSelected.length > 0) {
                for (let x in bukuSelected) {
                    if (bukuSelected[x].status_pinjam == 1) {
                        if (bukuSelected[x].kondisi == 0) {
                            $("#satuan_buku_2").append(new Option("Satuan buku " + bukuSelected[x].id + " [Rusak]",  bukuSelected[x].id));
                        }
                        else {
                            $("#satuan_buku_2").append(new Option("Satuan buku " + bukuSelected[x].id + " [Bagus]",  bukuSelected[x].id));
                        }
                    }
                }
            }
            else {
                $('#satuan_buku_2').append(
                    $('<option>', {
                        value     : '',
                        text      : 'Tidak ada buku tersedia',
                        //This here
                        disabled  : 'disabled',
                        selected  : 'selected'
                    })
                );
            }
        });

        $('#buku_3').on('change', function() {
            var formBuku = $('#buku_3').find(":selected").val();
            var satuanBuku = {!! $satuanBuku->toJson() !!}
            var bukuSelected = satuanBuku.filter(satuanBuku=>satuanBuku.id_buku==formBuku);
            $("#satuan_buku_3").find('option').remove();

            if (bukuSelected.length > 0) {
                for (let x in bukuSelected) {
                    if (bukuSelected[x].status_pinjam == 1) {
                        if (bukuSelected[x].kondisi == 0) {
                            $("#satuan_buku_3").append(new Option("Satuan buku " + bukuSelected[x].id + " [Rusak]",  bukuSelected[x].id));
                        }
                        else {
                            $("#satuan_buku_3").append(new Option("Satuan buku " + bukuSelected[x].id + " [Bagus]",  bukuSelected[x].id));
                        }
                    }
                }
            }
            else {
                $('#satuan_buku_3').append(
                    $('<option>', {
                        value     : '',
                        text      : 'Tidak ada buku tersedia',
                        //This here
                        disabled  : 'disabled',
                        selected  : 'selected'
                    })
                );
            }
        });
    </script>



    @if((session('done')))
    <script>
        $(document).ready(function(){
            alertDone('Data pinjaman berhasil di tambahkan')
        });
    </script>
    @endif

    @if((session('failed')))
        <script>
            $(document).ready(function(){
                alertFail('Data pinjaman gagal di tambahkan')
            });
        </script>
    @endif
@endpush
