<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // View laporan bulanan
        DB::statement("
            CREATE VIEW laporan_bulanan AS
            SELECT 
                YEAR(tanggal_transaksi) as tahun,
                MONTH(tanggal_transaksi) as bulan,
                MONTHNAME(tanggal_transaksi) as nama_bulan,
                COUNT(*) as total_transaksi,
                SUM(total_bayar) as total_pendapatan
            FROM transaksi 
            GROUP BY tahun, bulan, nama_bulan
            ORDER BY tahun DESC, bulan DESC
        ");

        // View laporan tahunan
        DB::statement("
            CREATE VIEW laporan_tahunan AS
            SELECT 
                YEAR(tanggal_transaksi) as tahun,
                COUNT(*) as total_transaksi,
                SUM(total_bayar) as total_pendapatan
            FROM transaksi 
            GROUP BY YEAR(tanggal_transaksi)
            ORDER BY tahun DESC
        ");
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS laporan_bulanan');
        DB::statement('DROP VIEW IF EXISTS laporan_tahunan');
    }
};
