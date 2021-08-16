@extends('/layout/layout')
@push('duar')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
        @section('content')
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <h1 class="h3 mb-2 text-gray-800">Manajemen penerbit</h1>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar penerbit</h6>
                                    <a href="{{ route('penerbit-add') }}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah penerbit</span>
                                    </a>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div>
                                        @if ($penerbit->count() < 1)
                                        <div class="card-body my-auto">
                                            <p class="fs-5 my-auto text-center">Tidak ada penerbit</p>
                                        </div>
                                        @else
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama penerbit</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($penerbit as $data)
                                                        <tr class="text-center align-middle my-auto">
                                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                                            <td class="align-middle">{{ $data->nama_penerbit }}</td>
                                                            <td>
                                                                <form action="{{ route('penerbit-show-update', $data->id) }}" class="d-inline">
                                                                    @csrf
                                                                    <a onclick='this.parentNode.submit(); return false;' class="btn btn-primary btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-eye"></i>
                                                                        </span>
                                                                        <span class="text">Update penerbit</span>
                                                                    </a>
                                                                </form>
                                                                <form action="{{ route('penerbit-delete', $data->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    <a onclick='this.parentNode.submit(); return false;' class="btn btn-danger btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-trash"></i>
                                                                        </span>
                                                                        <span class="text">Hapus penerbit</span>
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
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
                $('#penerbit').addClass('active');
            });

            $(document).ready(function() {
                $('#dataTable').DataTable({
                    "oLanguage": {
                        "sSearch" : "Cari:",
                        "sZeroRecords" : "Data tidak ditemukan",
                        "sSearchPlaceholder" : "Cari data penerbit..",
                        "emptyTable" : "Tidak terdapat data penilaian",
                        "infoEmpty" : "Menampilkan 0 data",
                        "infoFiltered" : "(dari _MAX_ data)",
                        "lengthMenu" : "Tampilkan _MENU_ data per halaman",
                    },
                    "language": {
                        "paginate": {
                            "previous" : "Sebelumnya",
                            "next" : "Berikutnya"
                        },
                        "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    }
                });
            });
        </script>

        </script>

    @if((session('done-delete')))
        <script>
            $(document).ready(function(){
                alertDone('Data penerbit berhasli di hapus')
            });
        </script>
    @endif

    @if((session('failed-delete')))
        <script>
            $(document).ready(function(){
                alertFail('Data penerbit gagal di hapus')
            });
        </script>
    @endif
@endpush


