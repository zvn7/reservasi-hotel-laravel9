<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'room_service') {
            Session::flush();
            Auth::logout();
            return redirect('/login') -> with('error', 'Anda tidak memiliki akses ke dashboard');
        }

        $recentReservations = Reservasi::select('reservasi.*', 'pengunjung.nama as nama_pengunjung', 'pengunjung.alamat', 'pengunjung.email', 'pengunjung.telepon', 'kamar.tipe_kamar', 'kamar.nomor_kamar')
        ->leftJoin('pengunjung', 'pengunjung.id', '=', 'reservasi.id_pengunjung')
        ->leftJoin('kamar', 'kamar.id', '=',  'reservasi.id_kamar')
        ->orderBy('reservasi.created_at', 'desc')
        ->take(5)
        ->get();

        $totalReservations = Reservasi::count();
        $upcomingReservations = Reservasi::where('tanggal_checkin', '>', now())->count();
        $completedReservations = Reservasi::where('status_pembayaran', 1)->count();

        return view('dashboard.index', compact('recentReservations', 'totalReservations', 'upcomingReservations', 'completedReservations'));

    }


}
