<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarPinjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_pinjaman', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal');
            $table->integer('jumlah_bayar');
            $table->string('keterangan', 500);
            $table->string('pembayaran')->nullable();
            $table->foreignId('pengeluaran_id')->references('id')->on('pengeluarans');
            $table->foreignId('anggota_id')->references('id')->on('users');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('bayar_pinjamen');
    }
}
