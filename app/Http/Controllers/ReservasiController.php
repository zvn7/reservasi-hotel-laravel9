<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Kamar;
use App\Models\Pengunjung;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservasiController extends Controller
{
    /**
     * Menampilkan daftar reservasi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data reservasi beserta informasi kamar, pengunjung, dan karyawan terkait menggunakan operasi join antar tabel.
        $reservasis = Reservasi::select('reservasi.*', 'kamar.nomor_kamar', 'kamar.tipe_kamar', 'kamar.harga', 'pengunjung.nama', 'pengunjung.alamat', 'pengunjung.email', 'pengunjung.telepon' , 'karyawan.nama_lengkap')
            ->leftJoin('pengunjung', 'pengunjung.id', '=', 'reservasi.id_pengunjung')
            ->leftJoin('kamar', 'kamar.id', '=',  'reservasi.id_kamar')
            ->leftJoin('karyawan', 'karyawan.id', '=', 'reservasi.id_karyawan')
            ->orderBy('reservasi.id', 'desc')
            ->get();

        // Mengirimkan data reservasi ke halaman view "reservasi.index".
        return view("reservasi.index", compact(['reservasis']));
    }

    /**
     * Menampilkan formulir untuk membuat reservasi baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil daftar kamar yang tersedia dan daftar pengunjung.
        $kamars = Kamar::select('kamar.*')->where('kamar.ketersediaan', 1)->get();
        $pengunjungs = Pengunjung::all();

        // Mengirimkan data kamar dan pengunjung ke halaman view "reservasi.create".
        return view("reservasi.create", compact(['kamars', 'pengunjungs']));
    }

    /**
     * Menyimpan data reservasi baru ke dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data input menggunakan aturan tertentu.
        $validated = $request->validate([
            'id_kamar' => 'required',
            'id_pengunjung' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'status_pembayaran' => 'required',
        ], [
            'id_kamar.required' => 'Pilih Kamar',
            'id_pengunjung.required' => 'Pilih Pengunjung',
            'checkin.required' => 'Masukkan Tanggal Check In',
            'checkout.required' => 'Masukkan Tanggal Check Out',
            'status_pembayaran.required' => 'Pilih Status Pembayaran',
        ]);

        // Menghitung harga total berdasarkan informasi kamar dan tanggal pemesanan.
        $kamar = Kamar::find($request->id_kamar);
        $harga = $kamar->harga;
        $cekin = date_create($request->checkin);
        $cekout = date_create($request->checkout);
        $lamaInap = date_diff($cekin, $cekout)->format('%d');
        $totalHarga = $lamaInap * $harga;

        // Membuat objek Reservasi dan menyimpan data ke dalam database.
        $reservasi = new Reservasi();
        $reservasi->id_kamar = $request->id_kamar;
        $reservasi->id_pengunjung = $request->id_pengunjung;
        $reservasi->id_karyawan = Auth::user()->id;
        $reservasi->tanggal_checkin = $request->checkin;
        $reservasi->tanggal_checkout = $request->checkout;
        $reservasi->lama_hari = $lamaInap;
        $reservasi->harga_kamar = $harga;
        $reservasi->total_harga = $totalHarga;
        $reservasi->status_pembayaran = $request->status_pembayaran;
        $reservasi->save();

        // Update status kamar menjadi tidak tersedia.
        $kamar->update(['ketersediaan' => 0]);

        // Redirect ke halaman reservasi dengan pesan sukses atau gagal.
        if ($validated) {
            return redirect('reservasi')->with('success', 'Data Reservasi Telah Ditambahkan');
        } else {
            return redirect('reservasi')->with('error', 'Data Reservasi Gagal Ditambahkan');
        }
    }

    /**
     * Menampilkan detail reservasi tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil data reservasi beserta informasi kamar, pengunjung, dan karyawan terkait berdasarkan ID reservasi.
        $reservasi = Reservasi::select('reservasi.*', 'kamar.nomor_kamar', 'kamar.tipe_kamar', 'kamar.harga', 'pengunjung.nama', 'pengunjung.alamat', 'pengunjung.email', 'pengunjung.telepon' , 'karyawan.nama_lengkap')
            ->leftJoin('pengunjung', 'pengunjung.id', '=', 'reservasi.id_pengunjung')
            ->leftJoin('kamar', 'kamar.id', '=',  'reservasi.id_kamar')
            ->leftJoin('karyawan', 'karyawan.id', '=', 'reservasi.id_karyawan')
            ->where('reservasi.id', $id)
            ->first();

        // Mengirimkan data reservasi ke halaman view "reservasi.show".
        return view("reservasi.show", compact(['reservasi']));
    }

    /**
     * Menghasilkan invoice dalam bentuk PDF untuk reservasi tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id) {
        // Mengambil data reservasi beserta informasi kamar, pengunjung, dan karyawan terkait berdasarkan ID reservasi.
        $reservasi = Reservasi::select('reservasi.*', 'kamar.nomor_kamar', 'kamar.tipe_kamar', 'kamar.harga', 'pengunjung.nama', 'pengunjung.alamat', 'pengunjung.email', 'pengunjung.telepon' , 'karyawan.nama_lengkap')
            ->leftJoin('pengunjung', 'pengunjung.id', '=', 'reservasi.id_pengunjung')
            ->leftJoin('kamar', 'kamar.id', '=',  'reservasi.id_kamar')
            ->leftJoin('karyawan', 'karyawan.id', '=', 'reservasi.id_karyawan')
            ->where('reservasi.id', $id)
            ->first();

        // Membuat objek PDF untuk invoice.
        $pdf = Pdf::loadView('reservasi.invoice', compact(['reservasi']));

        // Mengunduh file PDF invoice.
        return $pdf->download('Invoice - '. $reservasi->id. '.pdf');
    }

    /**
     * Menampilkan formulir untuk mengedit data reservasi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mengambil data reservasi berdasarkan ID.
        $reservasi = Reservasi::find($id);

        // Mengirimkan data reservasi ke halaman view "reservasi.edit".
        return view("reservasi.edit", compact(['reservasi']));
    }

    /**
     * Memperbarui data reservasi yang ada di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data input untuk status pembayaran.
        $validated = $request->validate([
            'status_pembayaran' => 'required',
        ], [
            'status_pembayaran.required' => 'Pilih Status Pembayaran',
        ]);

        // Mengambil data reservasi berdasarkan ID.
        $reservasi = Reservasi::find($id);

        // Memperbarui status pembayaran reservasi.
        $reservasi->status_pembayaran = $request->status_pembayaran;
        $reservasi->save();

        // Redirect ke halaman reservasi dengan pesan sukses atau gagal.
        if ($validated) {
            return redirect('reservasi')->with('success', 'Status Pembayaran Reservasi Telah Diperbarui');
        } else {
            return redirect('reservasi')->with('error', 'Status Pembayaran Reservasi Gagal Diperbarui');
        }
    }

    /**
     * Menghapus data reservasi dari penyimpanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
