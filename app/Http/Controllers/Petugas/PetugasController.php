<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function index()
    {
        $totalTransaksiToday = Transaksi::whereDate('tanggal_transaksi', today())->count();
        $totalPendapatanToday = Transaksi::whereDate('tanggal_transaksi', today())->sum('total_bayar');
        $totalBarang = Barang::count();

        return view('petugas.dashboard', compact('totalTransaksiToday', 'totalPendapatanToday', 'totalBarang'));
    }

    public function barangIndex()
    {
        $barangs = Barang::all();
        return view('petugas.barang', compact('barangs'));
    }

    public function barangSearch(Request $request)
    {
        $query = $request->get('query');
        $barangs = Barang::where('nama_barang', 'like', '%' . $query . '%')
                        ->orWhere('kode_barang', 'like', '%' . $query . '%')
                        ->get();

        return response()->json($barangs);
    }

    public function transaksiCreate()
    {
        $users = User::all(); // Assuming petugas can select any user for a transaction
        $barangs = Barang::all();
        return view('petugas.transaksi_add', compact('users', 'barangs'));
    }

    public function transaksiStore(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'total_bayar' => 'required|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.barang_id' => 'required|exists:barang,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $transaksi = Transaksi::create([
                'kode_transaksi' => 'TRX-' . time(), // Generate random code
                'user_id' => Auth::id(), // Assign logged-in user
                'total_bayar' => $request->total_bayar,
                'tanggal_transaksi' => $request->tanggal_transaksi,
                'waktu_transaksi' => now()->toTimeString(), // Assign current time
            ]);

            foreach ($request->items as $item) {
                $barang = Barang::find($item['barang_id']);
                if (!$barang || $barang->stok < $item['jumlah']) {
                    throw new \Exception('Stok barang tidak mencukupi atau barang tidak ditemukan.');
                }

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $item['barang_id'],
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $barang->harga, // Added this line
                    'subtotal' => $barang->harga * $item['jumlah'],
                ]);

                // Update stock
                $barang->stok -= $item['jumlah'];
                $barang->save();
            }
        });

        return redirect()->route('petugas.dashboard')->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
