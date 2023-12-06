<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->startOfDay();

        $pendapatanHariIni = Pembayaran::whereDate('created_at', $today)->sum('total_bayar');
        $dateNow = date('Y-m-d');
        $pasienHariIni = Pemeriksaan::where('status', 'hadir')->whereHas('jadwal', function ($query) use ($dateNow) {
            $query->whereDate('tanggal', $dateNow);
        })->count();
        $currentMonth = date('m');
        $currentYear = date('Y');
        $pasienThBulanIni = Pemeriksaan::where('status', 'tidak hadir')->whereHas('jadwal', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('tanggal', $currentMonth)
            ->whereYear('tanggal', $currentYear);;
        })->count();
        $pasienHBulanIni = Pemeriksaan::where('status', 'hadir')->whereHas('jadwal', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('tanggal', $currentMonth)
                ->whereYear('tanggal', $currentYear);
        })->count();


        $jumlahDaftarPasien =  Pemeriksaan::where('status', 'hadir')
        ->whereHas('jadwal', function ($query) use ($today) {
            $query->whereDate('tanggal', $today);
        })
        ->distinct('name')
        ->count('name');
        return view('pages.home', compact('pendapatanHariIni', 'pasienHariIni', 'jumlahDaftarPasien','pasienThBulanIni','pasienHBulanIni'));
    }
    public function getPaidMonthly()
    {
        $monthlyPayments = Pembayaran::select(
            DB::raw('DATE_FORMAT(created_at, "%M") as month_name'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(total_bayar) as total_bayar_sum'),
            DB::raw('MAX(status) as status_lunas')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
        return response()->json($monthlyPayments);
    }
}
