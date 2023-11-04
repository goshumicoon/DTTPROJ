{{-- <x-Admins-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ADMIN PAGE
    </h2>
</x-slot>

<h1>THIS IS USER PAGE</h1>
<h2>id session :</h2>

</x-Admins-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> <!-- Font Awesome CSS -->
    <title>Travel Umroh dan Haji Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/anjay.css')}}">
    <style>
        /* CSS tambahan */
        .sidebar {
            width: 60px; /* Lebar sidebar ketika collapsed */
            transition: width 0.3s ease-in-out;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow: hidden;
            background-color: #000; /* Warna background sidebar */
            color: #fff; /* Warna teks sidebar */
        }

        .sidebar.expanded {
            width: 260px; /* Lebar sidebar ketika expanded */
        }

        .logo {
            text-align: center;
            padding: 20px 0;
        }

        .logo i {
            font-size: 24px; /* Ukuran ikon burger */
        }

        .menu {
            display: none; /* Menu awalnya disembunyikan */
            flex-direction: column; /* Tampilan vertikal saat collapsed */
        }

        .menu.expanded {
            display: flex; /* Tampilkan menu saat expanded */
            flex-direction: column; /* Tampilan vertikal saat expanded */
            justify-content: flex-start; /* Menyusun submenu dari atas ke bawah */
            align-items: flex-start; /* Menyusun submenu dari kiri ke kanan */
        }

        /* CSS untuk ikon submenu yang lebih kecil */
        .submenu-icon {
            font-size: 18px; /* Ukuran ikon submenu yang lebih kecil */
            margin-right: 10px; /* Jarak antara ikon dan teks submenu */
        }

        /* CSS untuk konten */
        .content {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 80px;
            margin-right: 20px;
            margin-top: 100px;
        }

        .content.expanded {
            margin-left: 260px; /* Sesuaikan dengan lebar sidebar yang dipilih ketika expanded */
        }

        /* CSS untuk garis pemisah */
        .separator {
            border-bottom: 1px solid #ccc;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /* CSS untuk progress indicator */
        .progress-indicator {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .progress-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bubble {
            width: 1rem;
            height: 1rem;
            background-color: #3490dc; /* Ganti dengan warna yang Anda inginkan */
            border-radius: 50%;
            margin-bottom: 0.5rem; /* Atur jarak vertikal antara bubble */
        }
        /* CSS untuk logo Dashboard dan My Order */
        .logo-dashboard,
        .logo-my-order {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .sidebar.expanded .logo-dashboard,
        .sidebar.expanded .logo-my-order {
            opacity: 1;
        }

        /* CSS untuk header */
        .header {
            position: fixed;
            top: 0;
            left: 70px; /* Sesuaikan dengan lebar sidebar collapsed */
            right: 0;
            background-color: #fff; /* Warna background header */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .user-dropdown {
            position: relative;
        }

        .user-dropdown-content {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .user-dropdown:hover .user-dropdown-content {
            display: block;
        }


        /* CSS untuk konten notifikasi */
        #notificationContent {
            width: 200px; /* Sesuaikan dengan lebar konten notifikasi */
            /* Tambahkan gaya lain sesuai kebutuhan Anda */
        }



        /* CSS untuk tombol dropdown */
        .dropdown-button {
            background-color: transparent; /* Hapus warna latar belakang */
            border: 2px solid #3490dc; /* Tambahkan border dengan warna yang Anda inginkan */
            color: #333; /* Warna teks tombol */
            padding: 8px 16px; /* Atur padding sesuai kebutuhan */
            border-radius: 4px; /* Atur border radius sesuai kebutuhan */
            transition: background-color 0.3s ease, color 0.3s ease; /* Animasi perubahan warna */
        }

        .dropdown-button:hover {
            background-color: #3490dc; /* Warna latar belakang saat mouse hover */
            color: #fff; /* Warna teks saat mouse hover */
        }

        /* CSS untuk animasi */
        .progress-bar {
            width: 0%;
            transition: width 2s ease-in-out;
        }

        /* Set warna latar belakang dan border-radius */
        .progress-bar {
            background-color: #3490dc;
            border-radius: 5px;
        }

        /* Sesuaikan tinggi dan padding jika perlu */
        .progress-bar {
            height: 10px;
            padding: 0;
        }




    </style>
</head>
<body class="bg-gray-200" style="display: flex; flex-direction: column; min-height: 100vh;">

    <div id="ajax-content" style="min-height: 80vh; height: auto; padding-bottom: 2.5rem;">
    <link rel="stylesheet" type="text/css" href="{{asset('css/progress-wizard.min.css')}}">

<!-- Sidebar -->
<div id="sidebar" class="h-screen w-1/8 bg-black text-white fixed top-0 left-0 p-4">
    <div class="logo">
        <i class="fas fa-bars text-2xl"></i>
    </div>
    <div class="separator"></div>
    <div id="logo_dashboard_luar" class="logo">
        <i class="fas fa-chart-pie submenu-icon"></i>
    </div>
    <div id="logo_order_luar" class="logo">
        <i class="fas fa-shopping-cart submenu-icon"></i>
    </div>
    <ul class="menu">
        <li class="mb-4">
            <a href="#" class="hover:text-gray-500 flex items-center mb-2">
                <i class="fas fa-chart-pie submenu-icon"></i>
                <span class="menu-label">Dashboard</span>
            </a>
        </li>
        <li class="mb-4">
            <a href="#" class="hover:text-gray-500 flex items-center mb-2">
                <i class="fas fa-shopping-cart submenu-icon"></i>
                <span class="menu-label">My Order</span>
            </a>
        </li>
    </ul>
    <!-- Logo Dashboard -->
    <div class="logo-dashboard hidden text-center absolute top-4 left-8">
        <i class="fas fa-chart-pie text-2xl"></i>
        <span class="menu-label">Dashboard</span>
    </div>
    <!-- Logo My Order -->
    <div class="logo-my-order hidden text-center absolute top-16 left-8">
        <i class="fas fa-shopping-cart text-2xl"></i>
        <span class="menu-label">My Order</span>
    </div>
</div>

<!-- Header -->
<div class="header flex justify-between items-center py-4 px-4 bg-white shadow-md">
    <!-- Tombol Notifikasi -->
        <div class="relative inline-block text-gray-600" style="float: left; margin-right: 20px;">
        <button id="notificationButton" class="text-gray-700 hover:text-gray-900 focus:outline-none" type="button">
            <i class="fa-regular fa-bell fa-2x"></i>
        </button>
    </div>

    <div class="relative inline-block text-gray-600">
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="dropdown-button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            <img src="{{ asset($profilePhotoPath) }}" alt="Foto Profil" class="w-6 h-6 rounded-full mr-2">
            {{$erere;}}
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 right-0 absolute mt-10">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="openChangePasswordModal()">Ganti Password</a>
                </li>
                <li>
                    <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="openModalUserSetting()">Profile</button>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                </li>
            </ul>
        </div>
    </div>


</div>


<!-- Modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="settingsModalUser" aria-labelledby="settingsModalLabel" style="margin-top: 35px;">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="openModalUserSetting()">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal content -->
        <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start justify-between">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Your icon here -->
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="settingsModalLabel">Ubah Data Pengguna</h3>
                        <!-- Your content here -->
                    </div>
                    <div class="absolute top-0 right-0 mt-4 mr-4">
                        <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="closeModalUserSetting()">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <form id="settingsForm" class="mt-5 space-y-6" enctype="multipart/form-data" action="{{ route('updateUserSettings') }}" method="POST">
                    @csrf <!-- Tambahkan token CSRF -->
                    <!-- Isi form lainnya seperti yang sudah Anda miliki -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" class="form-input rounded-md shadow-sm mt-1 block w-full" id="email" name="email" value="{{ $email }}">
                    </div>
                    <div class="mb-4">
                        <label for="profile_photo" class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                        <input type="file" class="form-input rounded-md shadow-sm mt-1 block w-full" id="profile_photo" name="profile_photo">
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select rounded-md shadow-sm mt-1 block w-full" value="{{$jenis_kelamin}}">
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-textarea rounded-md shadow-sm mt-1 block w-full" rows="3" value="{{$alamat}}"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="tempat_lahir" name="tempat_lahir" value="{{$tempat_lahir}}">
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                        <input type="date" class="form-input rounded-md shadow-sm mt-1 block w-full" id="tanggal_lahir" name="tanggal_lahir" value="{{$tanggal_lahir}}">
                    </div>

                    <div class="mb-4">
                        <label for="no_ktp" class="block text-gray-700 text-sm font-bold mb-2">KTP</label>
                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="no_ktp" name="no_ktp" value="{{$no_ktp}}">
                    </div>

                    <div class="mb-4">
                        <label for="agama" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                        <select id="agama" name="agama" class="form-select rounded-md shadow-sm mt-1 block w-full" value="{{$agama}}">
                            <option value="ISLAM">ISLAM</option>
                            <option value="KRISTEN">KRISTEN</option>
                            <option value="KHATOLIK">KHATOLIK</option>
                            <option value="BUDHA">BUDHA</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="pekerjaan" class="block text-gray-700 text-sm font-bold mb-2">PEKERJAAN</label>
                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="pekerjaan" name="pekerjaan" value="{{$pekerjaan}}">
                    </div>
                    <!-- Tambahkan tombol "Simpan Perubahan" di sini -->
                    <div class="flex justify-between">
                        <button type="submit" class="w-1/2 rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">Simpan Perubahan</button>
                        <button type="button" class="w-1/2 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400 sm:text-sm" onclick="closeModalUserSetting()">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal for Change Password -->
<div id="changePasswordModal" class="fixed z-10 inset-0 overflow-y-auto hidden" style="margin-top: 40px;">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Add your change password form here -->
            <div class="w-full p-8">
                <!-- Old Password Field -->
                <div class="mb-4">
                    <label for="old_password" class="block text-gray-700 text-sm font-bold mb-2">Password Lama</label>
                    <input type="password" class="form-input rounded-md shadow-sm mt-1 block w-full" id="old_password" name="old_password">
                </div>
                <!-- New Password Field -->
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">Password Baru</label>
                    <input type="password" class="form-input rounded-md shadow-sm mt-1 block w-full" id="new_password" name="new_password">
                </div>
                <!-- Confirm New Password Field -->
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password Baru</label>
                    <input type="password" class="form-input rounded-md shadow-sm mt-1 block w-full" id="confirm_password" name="confirm_password">
                </div>
                <!-- Buttons -->
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="closeChangePasswordModal()">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600" onclick="ganti_passwordyes()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>










<!-- Main Content -->
<div class="content">
    <!-- Konten Berita Terbaru -->
    <div class="bg-white rounded-lg p-6 mb-4">
        <h2 class="text-xl font-semibold mb-4">Berita Terbaru Dream Travel Tour</h2>
        <!-- Tambahkan konten berita di sini -->
        <div class="mb-4">
            <h3 class="text-lg font-medium mb-2">Judul Berita 1</h3>
            <p class="text-gray-600">Deskripsi singkat berita 1.</p>
        </div>
        <div class="mb-4">
            <h3 class="text-lg font-medium mb-2">Judul Berita 2</h3>
            <p class="text-gray-600">Deskripsi singkat berita 2.</p>
        </div>
        <!-- Tambahkan lebih banyak berita jika diperlukan -->
    </div>
   <!--  <div class="flex justify-end p-4"> -->
        <!-- Card Container -->
<!--         <div id="openModal" class="bg-white rounded-lg shadow-md p-2 w-64 relative"> -->
            <!-- Isi Card -->
           <!--  <h2  class="text-xl font-semibold mb-4">Muhammad Ghozy Lathif</h2> -->

            <!-- Modal -->
          <!--   <div id="myModal" class="modal hidden absolute bg-white w-1/3 rounded-lg p-4 top-16 right-0">
                <h2 class="text-xl font-semibold mb-4">Profile</h2>
                <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
                <button id="closeModal" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-full">
                    Close
                </button>
            </div>
        </div>
    </div> -->

    <!-- Progress Pembayaran -->
    <div class="bg-white rounded-lg p-6 mb-4">
        <h2 class="text-xl font-semibold mb-4">Progress Pembayaran</h2>
        <div class="w-full bg-gray-300 h-6 rounded-full">
            <!-- Persentase Progress -->
            <div class="w-1/2 bg-green-500 h-6 rounded-full"></div>
        </div>
        <p class="mt-2">50% Complete</p>
    </div>

<!-- Progress Indikator -->
<div class="bg-white rounded-lg p-16">
    <h4 class="text-xl font-semibold mb-4 mt-0" style="margin-left: -35px;">ITEM 002 UMRAH</h4>
    <ul class="progress-indicator" id="stage_752">
        <li class="completed">
            <span class="bubble" onclick="show_modal(undefined,3461)"></span>
            <p>Registrasi &amp; Administrasi</p>
        </li>
        <li class="warning">
            <span class="bubble"></span>
            <p>Pembayaran</p>
        </li>
        <li class="">
            <span class="bubble"></span>
            <p>Penjadwalan</p>
            <p></p>
        </li>
        <li class="">
            <span class="bubble"></span>
            <p>PEMBERANGKATAN</p>
            <p></p>
        </li>
        <li class="">
            <span class="bubble"></span>
            <p>TIBA</p>
            <p></p>
        </li>
    </ul>
</div>

<!-- Modal untuk menampilkan pesan password berhasil diganti -->
<div style="margin-top: 35px;" id="passwordChangedModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start justify-between">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Password Berhasil Diganti</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Password Anda telah berhasil diganti.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // JavaScript untuk toggle sidebar saat mouse masuk atau keluar dari area sidebar
    const sidebar = document.getElementById('sidebar');
    const menu = document.querySelector('.menu');
    const content = document.querySelector('.content');
    const header = document.querySelector('.header'); // Tambahkan ini
    const logoDashboardLuar = document.getElementById('logo_dashboard_luar');
    const logoOrderLuar = document.getElementById('logo_order_luar');

    sidebar.addEventListener('mouseenter', () => {
        sidebar.classList.add('expanded');
        menu.classList.add('expanded');
        content.classList.add('expanded');
        logoDashboardLuar.style.display = 'none'; // Sembunyikan logo-dashboard saat mouse masuk
        logoOrderLuar.style.display = 'none'; // Sembunyikan logo-order saat mouse masuk
        // Ubah properti left header sesuai dengan lebar sidebar yang terbuka (140px)
        header.style.left = '140px';
    });

    sidebar.addEventListener('mouseleave', () => {
        sidebar.classList.remove('expanded');
        menu.classList.remove('expanded');
        content.classList.remove('expanded');
        logoDashboardLuar.style.display = 'block'; // Tampilkan kembali logo-dashboard saat mouse keluar
        logoOrderLuar.style.display = 'block'; // Tampilkan kembali logo-order saat mouse keluar
        // Kembalikan properti left header ke 70px ketika sidebar tertutup
        header.style.left = '70px';
    });
</script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
    // Dapatkan elemen progress bar
    const progressBar = document.querySelector(".progress-bar");

    // Set timeout kecil untuk memulai animasi
    setTimeout(function() {
        progressBar.style.width = "50%";
    }, 1000);
    });
    </script>



   <!-- Footer -->
    <footer class="text-center py-6 bg-gray-300" style="margin-top: 100px;">
        <h4>Copyright 2013, Freya</h4>
    </footer>

    <script>
        function openModalUserSetting() {
            // Tampilkan modal
            const modal = document.getElementById('settingsModalUser');
            modal.classList.remove('hidden');
            modal.classList.add('fixed', 'inset-0', 'overflow-y-auto');

            // Tutup modal jika tombol Esc ditekan
            modal.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeModalUserSetting();
                }
            });
        }

        function openChangePasswordModal() {
            // Tampilkan modal
            const modal = document.getElementById('changePasswordModal');
            modal.classList.remove('hidden');
            modal.classList.add('fixed', 'inset-0', 'overflow-y-auto');

            // Tutup modal jika tombol Esc ditekan
            modal.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeModalUserSetting();
                }
            });
        }

        function closeModalUserSetting() {
            // Tutup modal
            const modal = document.getElementById('settingsModalUser');
            modal.classList.remove('fixed', 'inset-0', 'overflow-y-auto');
            modal.classList.add('hidden');
        }


    </script>

    {{-- untuk ganti password --}}
    <script>
        function closeChangePasswordModal() {
        const modal = document.getElementById('changePasswordModal');
        modal.classList.remove('fixed', 'inset-0', 'overflow-y-auto');
        modal.classList.add('hidden');
    }



    function ganti_passwordyes(){
    // Dapatkan nilai dari input form
    const oldPassword = document.getElementById('old_password').value;
    const newPassword = document.querySelector('#new_password').value;
    const confirmPassword = document.querySelector('#confirm_password').value;

    // Buat objek data yang akan dikirim ke server
    const data = {
        old_password: oldPassword,
        new_password: newPassword,
        confirm_password: confirmPassword
    };

    // Kirim permintaan POST ke server dengan Axios
    axios.post('{{ route('change_password') }}', data)
        .then(response => {
            // Tanggapi respons dari server di sini
            console.log(response.data);
            // Tutup modal
            closeChangePasswordModal();
            // Reset form
            document.getElementById('old_password').value = "";
            document.getElementById('new_password').value = "";
            document.getElementById('confirm_password').value = "";

            // Tampilkan notifikasi
            // Munculkan modal notifikasi password berhasil diganti
            const passwordChangedModal = document.getElementById('passwordChangedModal');
            passwordChangedModal.classList.remove('hidden');
            passwordChangedModal.classList.add('fixed', 'inset-0', 'overflow-y-auto');

        })
        .catch(error => {
            // Tangani kesalahan jika terjadi
            console.error(error);

            if (error.response && error.response.status === 422) {
                // Tampilkan notifikasi jika password lama tidak cocok
                alert(error.response.data.message);
            }
        });
}

    // Ambil elemen modal
const modaler = document.getElementById('passwordChangedModal');

// Tambahkan event listener ke elemen modal
modaler.addEventListener('click', function (event) {
    closeModalnder();
});

// Fungsi untuk menutup modal
function closeModalnder() {
    modaler.classList.add('hidden');
}

    </script>






</body>
</html>

