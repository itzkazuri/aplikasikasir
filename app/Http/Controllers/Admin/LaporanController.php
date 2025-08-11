<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan');
    }

    public function generateMonthly(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000',
            'format' => 'required|in:excel,pdf',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $format = $request->format;

        $laporan = DB::table('laporan_bulanan')
                    ->where('bulan', $bulan)
                    ->where('tahun', $tahun)
                    ->get();

        if ($laporan->isEmpty()) {
            return back()->with('error', 'Tidak ada data laporan untuk bulan dan tahun yang dipilih.');
        }

        $headings = ['Tahun', 'Bulan', 'Nama Bulan', 'Total Transaksi', 'Total Pendapatan'];

        if ($format === 'excel') {
            return Excel::download(new LaporanExport($laporan, $headings), 'laporan_bulanan_' . $bulan . '_' . $tahun . '.xlsx');
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('pdf.laporan_bulanan', compact('laporan'));
            return $pdf->download('laporan_bulanan_' . $bulan . '_' . $tahun . '.pdf');
        }
    }

    public function generateAnnual(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2000',
            'format' => 'required|in:excel,pdf',
        ]);

        $tahun = $request->tahun;
        $format = $request->format;

        $laporan = DB::table('laporan_tahunan')
                    ->where('tahun', $tahun)
                    ->get();

        if ($laporan->isEmpty()) {
            return back()->with('error', 'Tidak ada data laporan untuk tahun yang dipilih.');
        }

        $headings = ['Tahun', 'Total Transaksi', 'Total Pendapatan'];

        if ($format === 'excel') {
            return Excel::download(new LaporanExport($laporan, $headings), 'laporan_tahunan_' . $tahun . '.xlsx');
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('pdf.laporan_tahunan', compact('laporan'));
            return $pdf->download('laporan_tahunan_' . $tahun . '.pdf');
        }
    }
}
