<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
                $table->string('nama')->unique();
                $table->string('nik')->unique()->nullable();
                $table->string('no_hp')->unique()->nullable();
                $table->string('tempat_lahir');
                $table->string('tanggal_lahir');
                $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
                $table->text('alamat');
                $table->string('pekerjaan')->nullable();
                $table->string('hubungan');
                $table->string('anak_ke')->nullable();
            $table->foreignId('keluarga_id')->references('id')->on('keluargas');
                $table->string('foto');
                $table->string('tugu')->nullable();
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
        Schema::dropIfExists('anggota_keluargas');
    }
}
