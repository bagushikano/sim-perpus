@extends('/layout/layout')
@push('duar')

@endpush
        @section('content')
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <h1 class="h3 mb-2 text-gray-800">Manajemen buku</h1>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar buku</h6>
                                    <a href="{{ route('buku-add') }}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah buku</span>
                                    </a>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div>
                                        @if ($buku->count() < 1)
                                        <div class="card-body my-auto">
                                            <p class="fs-5 my-auto text-center">Tidak ada buku</p>
                                        </div>
                                        @else
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama buku</th>
                                                        <th>ISBN</th>
                                                        <th>Nama Penerbit</th>
                                                        <th>Total buku</th>
                                                        <th>Buku rusak</th>
                                                        <th>Buku bagus</th>
                                                        <th>Buku dipinjam</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($buku as $data)
                                                        <tr class="text-center align-middle my-auto">
                                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                                            <td class="align-middle">{{ $data->nama_buku }}</td>
                                                            <td class="align-middle">{{ $data->isbn }}</td>
                                                            <td class="align-middle">{{ $data->penerbit->nama_penerbit }}</td>
                                                            <td class="align-middle">{{ $data->satuanBuku->count() }}</td>
                                                            <td class="align-middle">{{ $data->satuanBuku->where('kondisi', 0)->count() }}</td>
                                                            <td class="align-middle">{{ $data->satuanBuku->where('kondisi', 1)->count() }}</td>
                                                            <td class="align-middle">{{$data->satuanBuku->where('status_pinjam', 0)->count() }}</td>
                                                            <td>
                                                                <form action="{{ route('buku-show-update', $data->id) }}" class="d-inline">
                                                                    @csrf
                                                                    <a onclick='this.parentNode.submit(); return false;' class="btn btn-primary btn-circle">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-eye"></i>
                                                                        </span>

                                                                    </a>
                                                                </form>
                                                                <form action="{{ route('buku-delete', $data->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    <a onclick='this.parentNode.submit(); return false;' class="btn btn-danger btn-circle">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-trash"></i>
                                                                        </span>

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
                $('#buku').addClass('active');
            });

            $(document).ready(function() {
                $('#dataTable').DataTable({
                    "oLanguage": {
                        "sSearch" : "Cari:",
                        "sZeroRecords" : "Data tidak ditemukan",
                        "sSearchPlaceholder" : "Cari data buku..",
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


