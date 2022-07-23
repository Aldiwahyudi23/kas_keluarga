<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_hp', 13)->unique();
            $table->rememberToken();
            $table->string('role');
            $table->foreignId('keluarga_id')->references('id')->on('keluargas');
            $table->enum('is_active', ['0', '1']);
            $table->string('foto')->nullable();
            $table->string('program1')->nullable();
            $table->string('program2')->nullable();
            $table->string('program3')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('last_seen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
