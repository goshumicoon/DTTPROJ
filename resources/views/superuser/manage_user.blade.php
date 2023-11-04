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
        <title>Admin Manage User</title>

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
    <h2>Daftar Penawaran Dari Visitor</h2>
    <div class="card">
        <div class="card-body">
    {{-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBeritaModal" id="tambahBeritaButton">Tambah Berita</button> --}}
    <table class="table table-striped dataTable" id="daftarPenUser">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Pesan</th>
                <th>Created At</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($penawaran as $item)
            <tr id="kolomanjay{{ $item->id }}">
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->nomor_hp }}</td>
                <td>{{ $item->pesan }}</td>
                <td>{{ $item->created_at }}</td>
                {{-- <td>
                    <button id="ngehebutton{{$item->id}}" class="btn btn-warning btn-edit" data-id="{{ $item->id }}" data-target="editBeritaModal">Edit</button>
                    <button class="btn btn-danger btn-hapus" data-id="{{ $item->id }}" data-target="hapusBeritaModal">Hapus</button>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>

    <h2>Daftar User</h2>
    <div class="card">
        <div class="card-body">
    {{-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBeritaModal" id="tambahBeritaButton">Tambah Berita</button> --}}
    <table class="table table-striped dataTable" id="daftarListUser">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>No KTP</th>
                <th>Foto Profil</th>
                <th>Created At</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($all_user as $item)
            <tr id="kolomanjay{{ $item->id }}">
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->nope }}</td>
                <td>{{ $item->no_ktp }}</td>
                <td>
                    @if ($item->profile_photo_path)
                        <img src="{{ asset('storage/' . $item->profile_photo_path) }}" alt="Gambar" width="50">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                {{-- <td>
                    <button id="ngehebutton{{$item->id}}" class="btn btn-warning btn-edit" data-id="{{ $item->id }}" data-target="editBeritaModal">Edit</button>
                    <button class="btn btn-danger btn-hapus" data-id="{{ $item->id }}" data-target="hapusBeritaModal">Hapus</button>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        let table = new DataTable('#daftarPenUser', {
            "lengthMenu": [10, 25, 50, 100], // Menyediakan opsi untuk memilih jumlah data per halaman
            "pageLength": 10, // Jumlah data yang ditampilkan per halaman secara default
            "searching": true, // Aktifkan pencarian
            "info": true, // Tampilkan informasi jumlah data di bagian bawah tabel
            "pagingType": "full_numbers" // Tipe paginasi (bisa "simple", "full", dll.)
        });
        let table2 = new DataTable('#daftarListUser', {
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
