<?php

use Illuminate\Database\Seeder;

class addTransaksi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dipinjam
        DB::table('tb_transaksi')->insert([
            [
                'id_transaksi'=>'PM0005',
                'id_pelanggan'=>'5200411409',
                'id_kendaraan'=>3,
                'harga'=> 125000,
                'tgl_pinjam'=>'2021-12-08T12:05',
                'tgl_kembali'=>'2021-12-10T12:05',
                'waktu'=> 48,
                'total'=> 250000,
                'status'=> 'dipinjam',
                'denda'=> 0,
            ],[
                'id_transaksi'=>'PM0006',
                'id_pelanggan'=>'5200411416',
                'id_kendaraan'=>5,
                'harga'=> 175000,
                'tgl_pinjam'=>'2021-12-08T12:05',
                'tgl_kembali'=>'2021-12-09T12:05',
                'waktu'=> 24,
                'total'=> 175000,
                'status'=> 'dipinjam',
                'denda'=> 0,
            ]
        ]);

        // selesai
        DB::table('tb_transaksi')->insert([
            [
                'id_transaksi'=>'PM0001',
                'id_pelanggan'=>'5200411416',
                'id_kendaraan'=>3,
                'harga'=> 125000,
                'tgl_pinjam'=>'2021-11-08T12:05',
                'tgl_kembali'=>'2021-11-10T12:05',
                'waktu'=> 48,
                'total'=> 250000,
                'status'=> 'selesai',
                'denda'=> 0,
            ],[
                'id_transaksi'=>'PM0002',
                'id_pelanggan'=>'5200411417',
                'id_kendaraan'=>5,
                'harga'=> 175000,
                'tgl_pinjam'=>'2021-11-22T12:05',
                'tgl_kembali'=>'2021-11-23T12:05',
                'waktu'=> 24,
                'total'=> 175000,
                'status'=> 'selesai',
                'denda'=> 0,
            ],[
                'id_transaksi'=>'PM0003',
                'id_pelanggan'=>'5200411409',
                'id_kendaraan'=>4,
                'harga'=> 150000,
                'tgl_pinjam'=>'2021-12-01T12:05',
                'tgl_kembali'=>'2021-12-03T12:05',
                'waktu'=> 48,
                'total'=> 300000,
                'status'=> 'selesai',
                'denda'=> 0,
            ],[
                'id_transaksi'=>'PM0004',
                'id_pelanggan'=>'5200411332',
                'id_kendaraan'=>2,
                'harga'=> 100000,
                'tgl_pinjam'=>'2021-12-05T12:05',
                'tgl_kembali'=>'2021-12-06T12:05',
                'waktu'=> 24,
                'total'=> 100000,
                'status'=> 'selesai',
                'denda'=> 0,
            ]
        ]);
    }
}
