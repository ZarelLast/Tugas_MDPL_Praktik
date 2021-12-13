<?php

use Illuminate\Database\Seeder;

class addPelanggan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_pelanggan')->insert([
            [
                'id_pelanggan'=> '123321123',
                'nama'=>'Admin',
                'email'=>'admin@gmail.com',
                'alamat'=>'Semarang',
                'telp'=>'081xxxxxxxxxx',
                'password'=>bcrypt('admin123')
            ],[
                'id_pelanggan'=> '5200411416',
                'nama'=>'Muhammad Ilham Triwibowo',
                'email'=>'triwibowoilham02@gmail.com',
                'alamat'=>'Semarang',
                'telp'=>'081xxxxxxxxxx',
                'password'=>bcrypt('qwerty')
            ],[
                'id_pelanggan'=> '5200411417',
                'nama'=>'Rusli Pramono',
                'email'=>'RusliPra@gmail.com',
                'alamat'=>'',
                'telp'=>'081xxxxxxxxxx',
                'password'=>bcrypt('411417')
            ],[
                'id_pelanggan'=> '5200411409',
                'nama'=>'Pramudea Yohano Firmansyah',
                'email'=>'PramudeaYH@gmail.com',
                'alamat'=>'',
                'telp'=>'081xxxxxxxxxx',
                'password'=>bcrypt('411409')
            ],[
                'id_pelanggan'=> '5200411332',
                'nama'=>'Dwi Muhammad Faza',
                'email'=>'DwiMFaza@gmail.com',
                'alamat'=>'',
                'telp'=>'081xxxxxxxxxx',
                'password'=>bcrypt('411332')
            ],
        ]);
    }
}
