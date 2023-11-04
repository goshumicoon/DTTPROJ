{{-- <x-app-layout> --}}
    {{-- <h2>hayloo</h2> --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

{{-- disini tempat untuk dashboard --}}
{{-- </x-app-layout> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        <link rel="stylesheet" href="https:///cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Package</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('/lte/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('/lte/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/lte/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('/lte/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('/lte/plugins/summernote/summernote-bs4.min.css')}}">
      </head>
      <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="{{ asset('/lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        {{-- Main Navbar Container --}}
        @include('su_component.navbar_lte')

        <!-- Main Sidebar Container -->
        @include('su_component.sidebar_lte')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          {{-- <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Berita</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Manage Post</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div> --}}
          <!-- /.content-header -->

          <!-- Main content -->
<div class="container">
    <h2>Daftar Package</h2>
    <div class="card">
        <div class="card-body">
    {{-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBeritaModal" id="tambahBeritaButton">Tambah Berita</button> --}}
    <table class="table table-striped dataTable" id="daftarPackage">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Package</th>
                <th>Program Hari</th>
                <th>Tanggal Mulai</th>
                <th>Hotel</th>
                <th>Maskapai</th>
                <th>Harga</th>
                <th>Gambar Pamflet</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($package as $item)
            <tr id="kolomanjay{{ $item->id }}">
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_package }}</td>
                <td>{{ $item->program_hari }}</td>
                <td>{{ $item->tanggal_mulai }}</td>
                <td>{{ $item->list_hotel }}</td>
                <td>{{ $item->maskapai }}</td>
                <td>Rp. {{ number_format($item->harga, 0, ',', '.') }},-</td>
                <td>
                    @if ($item->path_gambar_pamflet)
                        <img src="{{ asset($item->path_gambar_pamflet) }}" alt="Gambar" width="50">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <button id="ngehebutton{{$item->id}}" class="btn btn-warning btn-edit" data-id="{{ $item->id }}" data-target="editPackageModal">Edit</button>
                    {{-- <button class="btn btn-danger btn-hapus" data-id="{{ $item->id }}" data-target="hapusBeritaModal">Hapus</button> --}}
                </td>
            </tr>
            <script>
                $(document).ready(function() {
                    $('#ngehebutton{{ $item->id }}').click(function() {
                        const packageId = $(this).data('id'); // Mengambil packageId dari atribut data-id

                        const data = {
                            packageId: packageId
                        };

                        axios.post("{{ route('get_package_data') }}", data) // Ganti dengan rute yang sesuai
                            .then(function(response) {
                                // Mengisi form modal edit dengan data paket yang diterima dari server
                                console.log(response);

                                $('#edit_nama_package').val(response.data.nama_package);
                                $('#edit_program_hari').val(response.data.program_hari);
                                $('#edit_tanggal_mulai').val(response.data.tanggal_mulai);
                                $('#edit_tanggal_selesai').val(response.data.tanggal_selesai);
                                $('#edit_hotel').val(response.data.list_hotel);
                                $('#edit_maskapai').val(response.data.maskapai);
                                $('#edit_harga').val(response.data.harga);
                                $('#edit_gambar_pamflet').val(response.data.path_gambar_pamflet);

                                $('#edit_package_id').val(response.data.id);

                                // Menampilkan modal edit
                                $('#editPackageModal').modal('show');
                            })
                            .catch(function(error) {
                                console.error('Gagal mengambil data paket:', error);
                                // Handle kesalahan jika diperlukan
                            });
                    });
                });
            </script>


            @endforeach
        </tbody>
    </table>
        </div>
    </div>

    {{-- text promo --}}
    <div class="card">
        <div class="card-header">Edit Teks Promo</div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('text_promo_update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="text_prom">Teks Promo</label>
                    <textarea class="form-control" id="text_prom" name="text_prom" rows="4" required>
                {{ $textPromo->text_prom ?? '' }}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>


    </div>



        <!-- Modal Tambah Berita -->
        <div class="modal fade" id="tambahBeritaModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Berita Baru</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
            <form action="{{ route('superuser.simpan-berita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Berita</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="gambar_berita">Gambar (Opsional)</label>
                    <input type="file" class="form-control-file" id="gambar_berita" name="gambar_berita">
                </div> --}}
                <div class="form-group">
                    <label for="lampiran_berita">Lampiran (Opsional)</label>
                    <input type="file" class="form-control-file" id="lampiran_berita" name="lampiran_berita">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>

    <!-- Modal Edit Berita -->
    <div class="modal fade" id="editPackageModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Package</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="editBeritaForm" enctype="multipart/form-data" action="{{route('update_package')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="edit_nama_package">Nama Package</label>
                            <input type="text" class="form-control" id="edit_nama_package" name="nama_package" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_program_hari">Program Hari</label>
                            <textarea class="form-control" id="edit_program_hari" name="program_hari" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="edit_tanggal_mulai" name="tanggal_mulai" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_hotel">Hotel</label>
                            <textarea class="form-control" id="edit_hotel" name="hotel" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_maskapai">Maskapai</label>
                            <textarea class="form-control" id="edit_maskapai" name="maskapai" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_harga">Harga</label>
                            <textarea class="form-control" id="edit_harga" name="harga" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_gambar_pamflet">Gambar Pamflet</label>
                            <input type="file" class="form-control-file" id="edit_gambar_pamflet" name="gambar_pamflet">
                        </div>
                        <input type="hidden" id="edit_package_id" name="package_id">


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanPerubahan">Simpan Perubahan</button>
                </div>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>

                    <!-- Modal Konfirmasi Hapus Berita -->
<div class="modal fade" id="hapusBeritaModal" tabindex="-1" role="dialog" aria-labelledby="hapusBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusBeritaModalLabel">Konfirmasi Hapus Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus berita ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="konfirmasiHapus">Hapus</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('#tambahBeritaButton').click(function() {

        // Tampilkan data berita di dalam tabel DataTable
        // Anda bisa mengambil data ini dari server dengan AJAX
        // Contoh sederhana di bawah ini:


        // Event handler untuk tombol Tambah Berita
        $('#tambahBeritaModal').modal('show');
    })
}
    );

</script>

<script>
    $(document).ready(function() {
        // Event handler untuk tombol Hapus
        $('.btn-hapus').click(function() {
            const packageId = $(this).data('id'); // Mengambil ID berita dari atribut data-id

            // Memasukkan ID berita ke dalam modal konfirmasi
            $('#hapusBeritaModal').data('berita-id', packageId);

            // Menampilkan modal konfirmasi
            $('#hapusBeritaModal').modal('show');
        });

        // Event handler untuk tombol konfirmasi Hapus
        $('#konfirmasiHapus').click(function() {
            const packageId = $('#hapusBeritaModal').data('berita-id'); // Mengambil ID berita dari modal konfirmasi

            // Kirim permintaan penghapusan ke server
            axios.post("{{ route('hapus_berita') }}", { packageId: packageId })
                .then(function(response) {
                    // Tutup modal konfirmasi
                    $('#hapusBeritaModal').modal('hide');

                    let table = new DataTable('#daftarPackage');
                    // Hapus baris berita dari tabel
                    const row = table.row(`#kolomanjay${packageId}`).remove().draw();
                })
                .catch(function(error) {
                    console.error('Gagal menghapus berita:', error);
                    // Handle kesalahan jika diperlukan
                });
        });
    });
</script>

<script>
    $(document).ready(function() {
        let table = new DataTable('#daftarPackage', {
            "lengthMenu": [10, 25, 50, 100], // Menyediakan opsi untuk memilih jumlah data per halaman
            "pageLength": 10, // Jumlah data yang ditampilkan per halaman secara default
            "searching": true, // Aktifkan pencarian
            "info": true, // Tampilkan informasi jumlah data di bagian bawah tabel
            "pagingType": "full_numbers" // Tipe paginasi (bisa "simple", "full", dll.)
        });
    });
</script>








          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- footer lte --}}
        @include('su_component.footer_lte')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="{{ asset('/lte/plugins/jquery/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{ asset('/lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      {{-- <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
      <!-- ChartJS -->
      <script src="{{ asset('/lte/plugins/chart.js/Chart.min.js')}}"></script>
      <!-- Sparkline -->
      <script src="{{ asset('/lte/plugins/sparklines/sparkline.js')}}"></script>
      <!-- JQVMap -->
      <script src="{{ asset('/lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
      <script src="{{ asset('/lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{ asset('/lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
      <!-- daterangepicker -->
      <script src="{{ asset('/lte/plugins/moment/moment.min.js')}}"></script>
      <script src="{{ asset('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="{{ asset('/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
      <!-- Summernote -->
      <script src="{{ asset('/lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
      <!-- overlayScrollbars -->
      <script src="{{ asset('/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('/lte/dist/js/adminlte.js')}}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{ asset('/lte/dist/js/demo.js')}}"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="{{ asset('/lte/dist/js/pages/dashboard.js')}}"></script>
      </body>
      </html>
