<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  @livewireStyles
  <style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    }
  </style>

  <!-- Scripts -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
  <link href="/dist/output.css" rel="stylesheet">

  <style>
    .site-header {
      position: fixed;
      z-index: 9999;
    }

    .main-sidebar {
      margin-top: 25px;
      position: relative;
      z-index: 1;
    }

    .content-wrapper {
      margin-top: 56px;
    }

    .icon-shadow {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.3;
  }

  .icon-shadow i {
    font-size: 80px;
    color: rgba(255, 255, 255, 0.7);
  }

  </style>
</head>
<body class="font-sans antialiased">
    <div class="wrapper">
  @livewire('navigation-menu')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- Order -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-shopping-cart nav-icon"></i>
              <p>Order</p>
            </a>
          </li>
          <!-- Download -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-download nav-icon"></i>
              <p>Download</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper mt-5">
    <section class="content">
      <div class="container" style="padding-top: 56px;">
        <!-- Cards -->
<!-- Cards -->
<div class="row">
    <div class="col-md-4">
      <div class="card bg-success">
        <div class="card-body">
          <h5 class="card-title text-white font-weight-bold">Total Close</h5>
          <p class="card-text text-white">100</p>
        </div>
        <div class="icon-shadow">
          <i class="fas fa-check-circle"></i>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-primary">
        <div class="card-body">
          <h5 class="card-title text-white font-weight-bold">Total Order</h5>
          <p class="card-text text-white">200</p>
        </div>
        <div class="icon-shadow">
          <i class="fas fa-shopping-cart"></i>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-danger">
        <div class="card-body">
          <h5 class="card-title text-white font-weight-bold">Total Cancel</h5>
          <p class="card-text text-white">50</p>
        </div>
        <div class="icon-shadow">
          <i class="fas fa-times-circle"></i>
        </div>
      </div>
    </div>
  </div>



        <!-- Chart -->
        <div class="card chart">
          <div class="card-body">
            <h5 class="card-title">Monthly Chart</h5>
            <!-- Add your chart here -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Footer content goes here -->
  </footer>

  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
  @livewireScripts
    </div>
</body>
</html>
