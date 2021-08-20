@extends('/layout/layout')
@push('duar')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
        @section('content')
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <h1 class="h3 mb-2 text-gray-800">Ganti password admin</h1>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password admin</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="nama_desa">Password lama</label>
                                                        <input value="" type="text" class="form-control" name="password_admin" id="password_admin_lama" placeholder="Contoh: Erlangga" required>
                                                    </div>
                                                </div>

                                                <div class="form-row mt-3">
                                                    <div class="col">
                                                        <label for="nama_desa">Password baru</label>
                                                        <input value="" type="text" class="form-control" name="password_admin" id="password_admin_baru" placeholder="Contoh: Erlangga" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="nama_desa">Konfirmasi password baru</label>
                                                        <input value="" type="text" class="form-control" name="password_admin" id="password_admin_confirm" placeholder="Contoh: Erlangga" required>
                                                    </div>

                                                </div>


                                            </div>
                                            <a onclick='this.parentNode.submit(); return false;' class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Ganti password</span>
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
            $('#passchange').addClass('active');
        });
    </script>


    @if((session('done')))
    <script>
        $(document).ready(function(){
            alertDone('Password berhasil di ganti')
        });
    </script>
    @endif

    @if((session('failed')))
        <script>
            $(document).ready(function(){
                alertFail('Password gagal di ganti')
            });
        </script>
    @endif
@endpush
