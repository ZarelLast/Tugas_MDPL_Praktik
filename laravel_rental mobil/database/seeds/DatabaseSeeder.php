<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(addPelanggan::class);
        $this->call(addMobil::class);
        $this->call(addTransaksi::class);
    }
}
