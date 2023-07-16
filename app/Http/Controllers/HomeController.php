<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $pendapatan = Pembayaran::where('created_at',now())->get();
        dd($pendapatan);
        return view('pages.home');
    }
}
