<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal');
            $table->integer('jumlah');
            $table->string('alasan',500);
            $table->text('sekertaris')->nullable();
            $table->text('bendahara')->nullable();
            $table->text('ketua')->nullable();
            $table->text('status')->nullable();
            $table->foreignId('anggaran_id')->references('id')->on('anggarans');
            $table->foreignId('anggota_id')->references('id')->on('users');
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
        Schema::dropIfExists('pengeluarans');
    }
}
