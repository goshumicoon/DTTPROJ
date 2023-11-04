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
        <title>Manage Berita</title>

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

        <style>

        </style>
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
<div class="container" >
    <h2 style="color:aliceblue;">Daftar Berita</h2>
    <div class="card">
        <div class="card-body">
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBeritaModal" id="tambahBeritaButton">Tambah Berita</button>
    <table class="table table-striped dataTable" id="daftarBerita">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Lampiran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $item)
            <tr id="kolomanjay{{ $item->id }}">
                <td>{{ $item->id }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" width="50">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    @if ($item->lampiran)
                        <a href="{{ asset('storage/' . $item->lampiran) }}">Unduh Lampiran</a>
                    @else
                        Tidak ada lampiran
                    @endif
                </td>
                <td>
                    <button id="ngehebutton{{$item->id}}" class="btn btn-warning btn-edit" data-id="{{ $item->id }}" data-target="editBeritaModal">Edit</button>
                    <button class="btn btn-danger btn-hapus" data-id="{{ $item->id }}" data-target="hapusBeritaModal">Hapus</button>
                </td>
            </tr>
            <script>
                $(document).ready(function() {
                    $('#ngehebutton{{ $item->id }}').click(function() {
                            const beritaId = $(this).data('id'); // Mengambil beritaId dari atribut data-id

                            const data = {
                                beritaId: beritaId
                            };

                            axios.post("{{ route('nyerere') }}", data) // Ganti dengan rute yang sesuai
                                .then(function(response) {
                                    // Mengisi form modal edit dengan data berita yang diterima dari server
                                    console.log(response);
                                    $('#edit_judul').val(response.data.judul);
                                    $('#edit_deskripsi').val(response.data.deskripsi);
                                    $('#edit_berita_id').val(response.data.id);

                                    // Menampilkan modal edit
                                    $('#editBeritaModal').modal('show');
                                })
                                .catch(function(error) {
                                    console.error('Gagal mengambil data berita:', error);
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
                <div class="form-group">
                    <label for="gambar_berita">Gambar (Opsional)</label>
                    <input type="file" class="form-control-file" id="gambar_berita" name="gambar_berita">
                </div>
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
    <div class="modal fade" id="editBeritaModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Berita</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="editBeritaForm" enctype="multipart/form-data" action="{{route('update_berita')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="edit_judul">Judul Berita</label>
                            <input type="text" class="form-control" id="edit_judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_gambar_berita">Gambar (Opsional)</label>
                            <input type="file" class="form-control-file" id="edit_gambar_berita" name="gambar_berita">
                        </div>
                        <div class="form-group">
                            <label for="edit_lampiran_berita">Lampiran (Opsional)</label>
                            <input type="file" class="form-control-file" id="edit_lampiran_berita" name="lampiran_berita">
                        </div>
                        <input type="hidden" id="edit_berita_id" name="berita_id">


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
            const beritaId = $(this).data('id'); // Mengambil ID berita dari atribut data-id

            // Memasukkan ID berita ke dalam modal konfirmasi
            $('#hapusBeritaModal').data('berita-id', beritaId);

            // Menampilkan modal konfirmasi
            $('#hapusBeritaModal').modal('show');
        });

        // Event handler untuk tombol konfirmasi Hapus
        $('#konfirmasiHapus').click(function() {
            const beritaId = $('#hapusBeritaModal').data('berita-id'); // Mengambil ID berita dari modal konfirmasi

            // Kirim permintaan penghapusan ke server
            axios.post("{{ route('hapus_berita') }}", { beritaId: beritaId })
                .then(function(response) {
                    // Tutup modal konfirmasi
                    $('#hapusBeritaModal').modal('hide');

                    let table = new DataTable('#daftarBerita');
                    // Hapus baris berita dari tabel
                    const row = table.row(`#kolomanjay${beritaId}`).remove().draw();
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
        let table = new DataTable('#daftarBerita', {
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
