<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|unique:barang|max:50',
            'nama_barang' => 'required|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Added validation for image
        ]);

        if ($request->hasFile('foto_barang')) {
            $image = $request->file('foto_barang');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/barang');
            $image->move($destinationPath, $name);
            $validatedData['foto_barang'] = '/upload/barang/'.$name; // Save relative path
        }

        Barang::create($validatedData); // Use validatedData

        return redirect()->route('admin.barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Delete image file if exists
        if ($barang->foto_barang && file_exists(public_path($barang->foto_barang))) {
            unlink(public_path($barang->foto_barang));
        }

        $barang->delete();

        return redirect()->route('admin.barang')->with('success', 'Barang berhasil dihapus!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.baredit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validatedData = $request->validate([
            'kode_barang' => 'required|max:50|unique:barang,kode_barang,' . $id,
            'nama_barang' => 'required|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_barang')) {
            // Delete old image if exists
            if ($barang->foto_barang && file_exists(public_path($barang->foto_barang))) {
                unlink(public_path($barang->foto_barang));
            }

            $image = $request->file('foto_barang');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/barang');
            $image->move($destinationPath, $name);
            $validatedData['foto_barang'] = '/upload/barang/'.$name;
        }

        $barang->update($validatedData);

        return redirect()->route('admin.barang')->with('success', 'Barang berhasil diperbarui!');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $barangs = Barang::where('nama_barang', 'like', '%' . $query . '%')
                        ->orWhere('kode_barang', 'like', '%' . $query . '%')
                        ->get();

        return response()->json($barangs);
    }
}
