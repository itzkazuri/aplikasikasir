<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Barang;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// You will need to install these packages:
// For Excel: composer require maatwebsite/excel
// For PDF: composer require barryvdh/laravel-dompdf

// use Maatwebsite\Excel\Facades\Excel;
// use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('user')->get();
        return view('admin.transaksi', compact('transaksis'));
    }

    public function create()
    {
        $users = User::all();
        $barangs = Barang::all();
        return view('admin.transaksi_add', compact('users', 'barangs'));
    }

    public function store(Request $request)
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

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['user', 'detailTransaksi.barang'])->findOrFail($id);
        return view('admin.transaksi_detail', compact('transaksi'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $transaksis = Transaksi::with('user')
                        ->where('kode_transaksi', 'like', '%' . $query . '%')
                        ->orWhereHas('user', function ($q) use ($query) {
                            $q->where('nama_lengkap', 'like', '%' . $query . '%');
                        })
                        ->get();

        return response()->json($transaksis);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::with(['user', 'detailTransaksi.barang'])->findOrFail($id);
        $users = User::all();
        $barangs = Barang::all();
        return view('admin.transaksi_edit', compact('transaksi', 'users', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'total_bayar' => 'required|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.barang_id' => 'required|exists:barang,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request, $transaksi) {
            $transaksi->update([
                'user_id' => $request->user_id,
                'total_bayar' => $request->total_bayar,
                'tanggal_transaksi' => $request->tanggal_transaksi,
                'waktu_transaksi' => now()->toTimeString(), // Assign current time
            ]);

            // Delete existing details and re-create them
            $transaksi->detailTransaksi()->delete();

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

                // Update stock (consider original stock if editing)
                // For simplicity, this example just subtracts. A more robust solution would track changes.
                $barang->stok -= $item['jumlah'];
                $barang->save();
            }
        });

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }
}
