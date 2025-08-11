<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBarang = Barang::count();
        $totalTransaksi = Transaksi::count();

        // For reports, we can fetch some summary data or just pass a flag
        // For now, let's just pass the counts.

        return view('admin.dashboard', compact('totalUsers', 'totalBarang', 'totalTransaksi'));
    }
}
