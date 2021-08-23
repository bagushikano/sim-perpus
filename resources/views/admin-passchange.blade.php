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
                                        <form method="POST" action="{{ route('update-admin-pass')}}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="password_old">Password lama</label>
                                                        <input value="" type="password" class="form-control" name="password_old" id="password_old" placeholder="Masukkan password lama" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                                        <label class="custom-control-label" for="customCheck" id="show_old_password" onclick="showPasswordOld()">Perlihatkan password</label>
                                                    </div>
                                                </div>

                                                <div class="form-row mt-3">
                                                    <div class="col">
                                                        <label for="password_new">Password baru</label>
                                                        <input value="" type="password" class="form-control" name="password_new" id="password_new" placeholder="Masukkan password baru" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1" id="show_new_password" onclick="showPasswordNew()">Perlihatkan password</label>
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

        function showPasswordOld() {
            var x = document.getElementById("password_old");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showPasswordNew() {
            var x = document.getElementById("password_new");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

    </script>


    @if((session('done')))
    <script>
        $(document).ready(function(){
            alertDone('Password berhasil di ganti')
        });
    </script>
    @endif

    @if((session('wrong-old-password')))
    <script>
        $(document).ready(function(){
            alertFail('Periksa kembali password lama')
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
