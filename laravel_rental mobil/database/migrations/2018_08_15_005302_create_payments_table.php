<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->string('id_transaksi')->primary();
            $table->string('id_pelanggan')->nullable();
            $table->integer('id_kendaraan')->nullable()->unsigned();
            $table->integer('harga');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->integer('waktu');
            $table->integer('total');
            $table->enum('status', ['dipinjam','selesai']);
            $table->integer('denda')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
        Schema::table('tb_transaksi', function($table) {
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('tb_pelanggan')->onDelete('set null');
            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('tb_kendaraan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
}
