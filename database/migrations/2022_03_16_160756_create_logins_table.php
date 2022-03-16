<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginsTable extends Migration
{
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id();
            $table->string('login_nama')->nullable();
            $table->string('login_username')->unique()->nullable();
            $table->string('login_password')->nullable();
            $table->string('login_email')->unique()->nullable();
            $table->string('login_telepon')->nullable();
            $table->string('login_alamat')->nullable();
            $table->text('login_token')->nullable();
            $table->string('login_level')->nullable(); // ADMIN - PETUGAS - USER
            $table->string('login_status')->nullable(); // unverified / verified

            $table->unsignedBigInteger('data_id')->nullable()->default(null);
            $table->foreign('data_id')->references('id')->on('data_pengguna')->onDelete('cascade');

            $table->timestamps();
    }

    public function down()
    {
        Schema::dropIfExists('login');
    }
}
