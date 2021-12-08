<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kendaraan', function (Blueprint $table) {
            $table->increments('id_kendaraan');
            $table->string('merek');
            $table->string('nopol', 10);
            $table->integer('harga');
            $table->enum('type', ['manual', 'matic']);
            $table->enum('status', ['tersedia', 'dipinjam']);
            $table->string('deskripsi');
            $table->string('gambar');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kendaraan');
    }
}
