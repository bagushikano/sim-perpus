@extends('/layout/layout')
@push('duar')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
        @section('content')
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <h1 class="h3 mb-2 text-gray-800">Tambah buku</h1>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data buku</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="{{ route('buku-store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="nama_buku">Nama buku</label>
                                                        <input type="text" class="form-control" name="nama_buku" id="nama_buku" placeholder="Contoh: Buku cerita anak (Maksimal 400 karakter)" required>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <div class="col">
                                                        <label for="isbn">ISBN buku</label>
                                                        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Contoh: 123-4-56-148410-0" required>
                                                    </div>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="penerbit">Penerbit buku</label>
                                                    </div>
                                                    <select class="custom-select" id="penerbit" name="penerbit">
                                                        <option hidden>Pilih penerbit buku</option>
                                                        @foreach ($penerbit as $penerbits)
                                                            <option value={{ $penerbits->id }}>{{ $penerbits->nama_penerbit}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text">Tambah buku</span>
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
        });
    </script>


    @if((session('done')))
    <script>
        $(document).ready(function(){
            alertDone('Data buku berhasil di tambahkan')
        });
    </script>
    @endif

    @if((session('failed')))
        <script>
            $(document).ready(function(){
                alertFail('Data buku gagal di tambahkan')
            });
        </script>
    @endif
@endpush
