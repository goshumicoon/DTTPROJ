<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Berita;
use App\Models\Package_dtt;
use App\Models\TextPromo;
use App\Models\PenawaranUser;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $package = Package_dtt::all();
        $user = Auth::user();
        $id_user = $user->id;
        $email = $user->email;
        $role = $user->privilage;
        $foto_profile = $user->profile_photo_path;
        $username = $user->name;
        $jenis_kelamin = $user->jenis_kelamin;
        $alamat = $user->alamat;
        $tempat_lahir = $user->tempat_lahir;
        $tanggal_lahir = $user->tanggal_lahir;
        $no_ktp = $user->no_ktp;
        $agama = $user->agama;
        $pekerjaan = $user->pekerjaan;

        // Ambil berita terbaru berdasarkan tanggal dibuat (created_at) secara descending (terbaru dulu)
        $latestBerita = Berita::latest('created_at')->first();

        if ($role == 0) {
            return view('user.dashboard', [
                'erere' => $username,
                'email' => $email,
                'id_user' => $id_user,
                'profilePhotoPath' => $foto_profile,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'no_ktp' => $no_ktp,
                'agama' => $agama,
                'pekerjaan' => $pekerjaan,
                'latestBerita' => $latestBerita,
                'package' => $package
            ]);
        } elseif ($role == 2) {
            return view('superuser.makepost', ['erere' => $username, 'latestBerita' => $latestBerita]);
        } else {
            return redirect()->route('login')->withErrors(['password' => 'Password Salah']);
        }
    }



    public function cek_admin()
    {
        $role = Auth::user()->privilage;
        $hasil_cek = "";
        if($role==1){
            //kalo admin
            return view('layouts.admin.admins')
            ->section('livewire.members');
        }else{
            echo "matamuu";
        }
    }

    public function logout()
    {
            // Logout pengguna
            Auth::logout();

           // Menghapus semua variabel sesi pengguna
            session()->flush();

            // Redirect ke halaman login atau halaman lain yang Anda inginkan
            return redirect('/login');
    }


    public function updateUserSettings(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'email' => 'email',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_lahir' => 'date',
        ]);

        // Ambil data pengguna yang saat ini masuk
        $user = Auth::user();

        // Perbarui email pengguna
        $user->email = $request->input('email');

        // Perbarui foto profil pengguna jika diunggah
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $profilePhotoPath;
            $nama_file = explode("/", $profilePhotoPath);
            $request->file('profile_photo')->move(public_path('profile_photos'), $nama_file[1]);
        }

        // Perbarui kolom-kolom lain sesuai input dari form
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->alamat = $request->input('alamat');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->no_ktp = $request->input('no_ktp');
        $user->no_sim = $request->input('no_sim');
        $user->agama = $request->input('agama');
        $user->pekerjaan = $request->input('pekerjaan');
        $user->status_pernikahan = $request->input('status_pernikahan');
        $user->status_kepegawaiaan = $request->input('status_kepegawaiaan');
        $user->golongan_darah = $request->input('golongan_darah');
        $user->no_bpjs = $request->input('no_bpjs');

        // Menyimpan perubahan ke dalam database
        $user->save();

            // Redirect pengguna ke rute tertentu setelah berhasil diperbarui
            return redirect()->route('redirects');
    }


    public function cekPassword(){
        $password_db = Auth::user()->password;
        // Mengambil password yang diinputkan oleh pengguna (tanpa menggunakan bcrypt)
        $inputPassword = '123qweasd'; // Ganti dengan password yang dimasukkan oleh pengguna

        // Memeriksa apakah password cocok
        if (Hash::check($inputPassword, $password_db)) {
            echo "Password cocok dengan yang ada pada database.";
        } else {
            echo "Password tidak cocok.";
        }
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
        ]);

        $user = Auth::user();

        // Periksa apakah kata sandi lama sesuai
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Password lama tidak cocok'], 422);
        }

        // Jika kata sandi lama sesuai, update kata sandi baru
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['message' => 'Kata sandi berhasil diperbarui'], 200);
    }

    public function daftarBerita(){
        $berita = Berita::all();
        $user = Auth::user()->name;
        return view('superuser.makepost', ['berita' => $berita, 'erere' => $user]);
    }

    public function tambahBerita()
    {
        return view('superuser.tambah-berita');
    }

    public function simpanBerita(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
            'lampiran' => 'nullable|mimes:pdf,doc,docx|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Simpan berita ke dalam database
        $berita = new Berita; // Pastikan menggunakan model Berita yang telah diperbarui
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;

        // Handle gambar jika ada
        if ($request->hasFile('gambar_berita')) {
            $gambarPath = $request->file('gambar_berita')->store('gambar_berita', 'public');
            $berita->gambar = $gambarPath;
            $nama_file = explode("/", $gambarPath);
            $request->file('gambar_berita')->move(public_path('gambar_berita'), $nama_file[1]);
        }

        // Handle lampiran jika ada
        if ($request->hasFile('lampiran_berita')) {
            $lampiranPath = $request->file('lampiran_berita')->store('lampiran_berita', 'public');
            $berita->lampiran = $lampiranPath;
            $nama_file = explode("/", $lampiranPath);
            $request->file('lampiran_berita')->move(public_path('lampiran_berita'), $nama_file[1]);
        }

        $berita->save();

        // Redirect kembali ke daftar berita
        return redirect()->route('postmin')->with('success', 'Berita berhasil disimpan.');
    }


    public function update_berita(Request $request){
            // Validasi data yang masuk
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        'lampiran_berita' => 'nullable|mimes:pdf,doc,docx|max:2048', // Sesuaikan dengan kebutuhan Anda
    ]);

    // Temukan berita berdasarkan ID
    $berita = Berita::find($request->berita_id);

    if (!$berita) {
        return redirect()->back()->with('error', 'Berita tidak ditemukan.');
    }

    // Update data berita
    $berita->judul = $request->judul;
    $berita->deskripsi = $request->deskripsi;

        // Handle gambar jika ada
        if ($request->hasFile('gambar_berita')) {
            $gambarPath = $request->file('gambar_berita')->store('gambar_berita', 'public');
            $berita->gambar = $gambarPath;
            $nama_file = explode("/", $gambarPath);
            $request->file('gambar_berita')->move(public_path('gambar_berita'), $nama_file[1]);
        }

        // Handle lampiran jika ada
        if ($request->hasFile('lampiran_berita')) {
            $lampiranPath = $request->file('lampiran_berita')->store('lampiran_berita', 'public');
            $berita->lampiran = $lampiranPath;
            $nama_file = explode("/", $lampiranPath);
            $request->file('lampiran_berita')->move(public_path('lampiran_berita'), $nama_file[1]);
        }

    $berita->save();

    return redirect()->route('postmin')->with('success', 'Berita berhasil diperbarui.');
    }



    public function ambil_berita(Request $request){
                $berita = Berita::find($request->beritaId);

                if (!$berita) {
                    return response()->json(['error' => 'Berita tidak ditemukan'], 404);
                }

                return response()->json($berita);
    }


    //site manage user
    public function ManageUserYes(){
        $all_user = User::all();
        $all_penawaran_user = PenawaranUser::all();
        $user = Auth::user()->name;
        return view('superuser.manage_user', ['penawaran' => $all_penawaran_user, 'erere' => $user, 'all_user' => $all_user]);
    }


    //site package
    public function PackageYes(){
        $package = Package_dtt::all();
        $textPromo = TextPromo::first();
        $user = Auth::user()->name;
        return view('superuser.package', ['package' => $package, 'erere' => $user, 'textPromo' => $textPromo]);
    }

    public function PromoUpdate(Request $request){
        $textPromo = TextPromo::first();
        $textPromo->update([
            'text_prom' => $request->input('text_prom'),
        ]);

        return redirect()->route('package')->with('success', 'Teks promo berhasil diperbarui.');
    }

    public function insert_penawaran(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'email',
            'nomor_hp' => '',
            'pesan' => '',
        ]);

        PenawaranUser::create($data);

        return response()->json('Data berhasil ditambahkan ke database.');
    }

    public function ambil_package(Request $request){
        $packageId = Package_dtt::find($request->packageId);

        if (!$packageId) {
            return response()->json(['error' => 'Post tidak ditemukan'], 404);
        }

        return response()->json($packageId);
    }

    public function hapusBerita(Request $request)
    {
        try {
            // Ambil ID berita dari permintaan
            $beritaId = $request->input('beritaId');

            // Cari berita berdasarkan ID
            $berita = Berita::find($beritaId);

            // Jika berita tidak ditemukan, kirim respons error
            if (!$berita) {
                return response()->json(['message' => 'Berita tidak ditemukan'], 404);
            }

            // Hapus berita
            $berita->delete();

            // Kirim respons sukses
            return response()->json(['message' => 'Berita berhasil dihapus'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Gagal menghapus berita: ' . $e->getMessage()], 500);
        }
    }

    public function updatePackage(Request $request)
    {
        // Validasi data input jika diperlukan
        $validatedData = $request->validate([
            'nama_package' => 'required|string',
            'program_hari' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'hotel' => 'required|string',
            'maskapai' => 'required|string',
            'gambar_pamflet' => 'image|nullable', // Jika ingin validasi gambar
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Ambil package ID dari input tersembunyi
        $packageId = $request->input('package_id');

        // Periksa apakah Anda ingin melakukan pembaruan atau penyimpanan baru
        if ($packageId) {
            // Lakukan pembaruan jika package ID ada
            $package = Package_dtt::findOrFail($packageId);

            $package->update([
                'nama_package' => $request->input('nama_package'),
                'program_hari' => $request->input('program_hari'),
                'tanggal_mulai' => $request->input('tanggal_mulai'),
                'list_hotel' => $request->input('hotel'),
                'maskapai' => $request->input('maskapai'),
                'harga' => $request->input('harga'),
            ]);
            if ($request->hasFile('gambar_pamflet')) {
                $lampiranPath = $request->file('gambar_pamflet')->store('gambar_pamflet', 'public');
                // $package->path_gambar_pamflet = $lampiranPath;
                $nama_file = explode("/", $lampiranPath);
                $request->file('gambar_pamflet')->move(public_path('pamflet_package'), $nama_file[1]);
                $package->update([
                    'path_gambar_pamflet' => 'pamflet_package/'.$nama_file[1],
                ]);
            }


        } else {
            // Lakukan penyimpanan baru jika tidak ada package ID
            $package = new Package_dtt;
            $package->nama_package = $request->input('nama_package');
            $package->program_hari = $request->input('program_hari');
            $package->tanggal_mulai = $request->input('tanggal_mulai');
            $package->list_hotel = $request->input('hotel');
            $package->maskapai = $request->input('maskapai');
            $package->harga = $request->input('harga');
            // Tambahkan atribut lainnya sesuai kebutuhan

            $package->save();
        }


        // Setelah berhasil memproses data, Anda dapat mengalihkan pengguna atau memberikan respons yang sesuai
        // Misalnya, mengalihkan kembali ke halaman yang sesuai
        return redirect()->route('package');
    }

}
