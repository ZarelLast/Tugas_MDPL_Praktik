<?php

use Illuminate\Database\Seeder;

class addMobil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kendaraan')->insert([
            [
                'merek' => 'Mazda Suv',
                'nopol' => 'B 1403 NZM',
                'harga' => 75000,
                'type' => 'manual',
                'status' => 'tersedia',
                'deskripsi' => 'Mazda Suv Merah seri terbaru, aman dan nyaman untuk perjalanan jarak jauh...',
                'gambar'=> 'mazda_suv.png'
            ],[
                'merek' => 'Honda Jazz',
                'nopol' => 'L 1492 JY',
                'harga' => 100000,
                'type' => 'Matic',
                'status' => 'tersedia',
                'deskripsi' => 'Honda Jazz Orange seri terbaru, aman dan nyaman untuk perjalanan jarak jauh...',
                'gambar'=> 'honda_jazz.png'
            ],[
                'merek' => 'Toyota Agya',
                'nopol' => 'AB 5213 H',
                'harga' => 125000,
                'type' => 'Matic',
                'status' => 'dipinjam',
                'deskripsi' => 'Toyota Agya Matic Kuning seri terbaru, aman dan nyaman untuk perjalanan jarak jauh...',
                'gambar'=> 'toyota_agya.png'
            ],[
                'merek' => 'Toyota Avanza',
                'nopol' => 'F 1793 BI',
                'harga' => 150000,
                'type' => 'manual',
                'status' => 'tersedia',
                'deskripsi' => 'Toyota Avanza Merah seri terbaru, aman dan nyaman untuk perjalanan jarak jauh...',
                'gambar'=> 'toyota_avanza.png'
            ],[
                'merek' => 'Toyota Yaris',
                'nopol' => 'W 1084 VE',
                'harga' => 175000,
                'type' => 'manual',
                'status' => 'dipinjam',
                'deskripsi' => 'Toyota Yaris Merah seri terbaru, aman dan nyaman untuk perjalanan jarak jauh...',
                'gambar'=> 'toyota_yaris.png'
            ]
        ]);
    }
}
