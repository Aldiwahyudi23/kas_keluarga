<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('email')->unique();
            $table->string('no_hp',13)->unique();
            $table->string('username');
            $table->string('password');
            $table->foreignId('program_id')->references('id')->on('programs');
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->foreignId('keluarga_id')->references('id')->on('keluargas');
            $table->enum('is_active',['0','1']);
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
        Schema::dropIfExists('anggotas');
    }
}
